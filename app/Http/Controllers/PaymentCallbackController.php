<?php

namespace App\Http\Controllers;

use App\Enumeration\StatusCode;
use App\Exceptions\GlobalException;
use App\Models\PaymentMethod;
use App\Models\Transaction;
use App\Repository\Order\OrderService;
use App\Repository\Payment\PaymentService;
use App\Repository\Transaction\TransactionService;
use App\Repository\ZaloPay\ZaloPayService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentCallbackController extends Controller
{
    private ZaloPayService $zaloPayService;
    private PaymentService $paymentService;
    private OrderService $orderService;
    private TransactionService $transactionService;
    public function __construct(
        ZaloPayService $zaloPayService,
        PaymentService $paymentService,
        OrderService   $orderService,
        TransactionService $transactionService
    ) {
        $this->zaloPayService = $zaloPayService;
        $this->paymentService = $paymentService;
        $this->orderService = $orderService;
        $this->transactionService = $transactionService;
    }

    /**
     * @param Request $request
     * @return void
     * @throws GlobalException
     */
    public function callback(Request $request) : void {
        switch ($request->get('merchant')) {
            case Str::upper(PaymentMethod::METHOD_ZALOPAY):
                try {
                    $callBackData = $this->zaloPayService->callback($request);
                } catch (\Exception $e) {
                    throw new GlobalException(StatusCode::INTERNAL_SERVER_ERROR->value, $e->getMessage());
                }
                break;
            default:
                throw new GlobalException(StatusCode::NOT_FOUND);
        }


        if (!empty($callBackData)) {
            $this->paymentService->updatePaymentByCallBack($callBackData);
            $this->transactionService->createTransactionByCallBack($callBackData);
        }
    }


}
