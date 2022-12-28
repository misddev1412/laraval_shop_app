<?php

namespace App\Http\Controllers\Admin;

use App\Enumeration\StatusCode;
use App\Enumeration\UserType;
use App\Exceptions\GlobalException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Order\CreateOrderRequest;
use App\Http\Requests\Order\UpdateOrderStatusRequest;
use App\Http\Resources\Order\OrderResource;
use App\Http\Resources\Payment\PaymentResource;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\ProductVariant\ProductVariantResource;
use App\Jobs\Order\ProcessSendEmailConfirmOrder;
use App\Mail\OrderConfirmed;
use App\Models\Order;
use App\Models\Payment;
use App\Repository\Order\OrderService;
use App\Repository\Payment\PaymentService;
use App\Repository\PaymentMethod\PaymentMethodService;
use App\Repository\Product\ProductService;
use App\Repository\ProductVariant\ProductVariantService;
use App\Repository\ZaloPay\ZaloPayService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Ramsey\Uuid\Type\Integer;

class OrderController extends Controller
{

    private OrderService $orderService;
    private ProductService $productService;
    private ProductVariantService $productVariantService;
    private PaymentMethodService $paymentMethodService;
    private ZaloPayService $zaloPayService;
    private PaymentService $paymentService;

    public function __construct(
        OrderService          $orderService,
        ProductService        $productService,
        ProductVariantService $productVariantService,
        PaymentMethodService  $paymentMethodService,
        ZaloPayService        $zaloPayService,
        PaymentService $paymentService
    ) {
        $this->orderService = $orderService;
        $this->productService = $productService;
        $this->productVariantService = $productVariantService;
        $this->paymentMethodService = $paymentMethodService;
        $this->zaloPayService = $zaloPayService;
        $this->paymentService = $paymentService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateOrderRequest $request
     * @return Response
     * @throws GlobalException
     */
    public function store(CreateOrderRequest $request)
    {
        $this->checkProductAvailable($request);
        $order = $this->orderService->create($request->validated())->load('currency')->load('items');
        $payment = $this->paymentService->create(
            $this->paymentService->buildData($request->validated()['payment_method_id'], $order->id)
        );
        $paymentInfo = $this->makePayment(
            $request->validated()['payment_method_id'],
            $order,
            $payment
        );

        $order['payment_info'] = $paymentInfo;
        $order['payment'] = PaymentResource::make($payment->load('paymentMethod')->load('currency'));
        ProcessSendEmailConfirmOrder::dispatch($order, $payment->load('paymentMethod')->load('currency'));
        return OrderResource::make($order);
    }

    /**
     * @throws GlobalException
     */
    public function makePayment($paymentMethodId, $orderData, Payment $payment) {
        $paymentMethod = $this->paymentMethodService->find($paymentMethodId)->first();
        $orderData['payment_id'] = $payment->id;
        $orderData['from_user_id'] = $orderData['user_id'];
        $orderData['to_user_id'] = $orderData['store_id'];
        $orderData['from_user_type'] = UserType::USER->value;
        $orderData['to_user_type'] = UserType::STORE->value;
        $orderData['transaction_type'] = Payment::TRANSACTION_TYPE_PAYMENT;
        switch ($paymentMethod->slug) {
            case 'zalopay':
                $dataCreatePayment = $this->zaloPayService->buildCreateOrderData($orderData);
                $response = $this->zaloPayService->generatePaymentUrl($dataCreatePayment);
                if ($response['return_code'] == 1) {
                    $response = [
                        'payment_method_id' => $paymentMethodId,
                        'payment_url' => $response['order_url'],
                        'token' => $response['order_token'],
                        'transaction_id' => $dataCreatePayment['app_trans_id'],
                        'payment_status' => Payment::PAYMENT_STATUS_PENDING,
                    ];
                }
                break;

        default:
            throw new GlobalException(StatusCode::NOT_FOUND->value, 'Payment method not found');

        }

        return $response;
    }


    /**
     * @param $request
     * @return void
     * @throws GlobalException
     */
    private function checkProductAvailable($request) {
        $productOutOfStocks = [];
        //Check if the product is available
        foreach ($request->validated()['order_items'] as $orderItem) {
            if (!$this->productService->checkUnlimitedStock(
                $orderItem['product_id'],
                $orderItem['product_variant_id'],
                $request->validated()['store_id']
            )) {
                $productOutOfStocks[] = [
                    'product_id' => $orderItem['product_id'],
                    'product_variant_id' => $orderItem['product_variant_id']
                ];
            }
        }

        $productOutOfStockTransformers = [];
        if (count($productOutOfStocks) > 0) {
            foreach ($productOutOfStocks as $productOutOfStock) {
                $productOutOfStockTransformers[] = [
                    'product' => ProductResource::make(
                        $this->productService->show($productOutOfStock['product_id'])
                    )->toShortArray(),
                    'product_variant' => ProductVariantResource::make(
                        $this->productVariantService->show($productOutOfStock['product_variant_id'])
                    )->toShortArray()
                ];
            }

        }

        if (count($productOutOfStockTransformers) > 0) {
            throw new GlobalException(
                StatusCode::BAD_REQUEST->value,
                __('messages.product_out_of_stock'),
                StatusCode::PRODUCT_OUT_OF_STOCK->value,
                $productOutOfStockTransformers
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return OrderResource::make($this->orderService->find($order->id)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param UpdateOrderStatusRequest $request
     * @param Order $order
     * @return OrderResource
     */
    public function updateStatus(Order $order, UpdateOrderStatusRequest $request): OrderResource
    {
        $this->orderService->updateStatus($order->id, $request->validated());
        return OrderResource::make($this->orderService->find($order->id)->first());
    }
}
