<?php

namespace App\Repository\Payment;

use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Repository\CrudInterfaceImpl;
use App\Repository\Order\OrderService;

class PaymentServiceImpl extends CrudInterfaceImpl implements PaymentService
{
    private OrderService $orderService;
    public function __construct(
        Payment $model,
        OrderService $orderService
    ){
        $this->model = $model;
        $this->orderService = $orderService;
    }

    public function buildData(int $paymentMethodId, $orderId)
    {
        $order = $this->orderService->find($orderId)->first();
        return [
            'order_id' => $orderId,
            'payment_method_id' => $paymentMethodId,
            'user_id' => auth()->id(),
            'payment_method_detail_id' => 0,
            'total_refunded_amount' => $order->total_refunded_amount,
            'total_canceled_amount' => $order->total_canceled_amount,
            'total_tax' => $order->total_tax,
            'total_shipping_cost' => $order->total_shipping_cost,
            'total_discount' => $order->total_discount,
            'total_original_amount' => $order->total_original_amount,
            'total_due_amount' => $order->total_due_amount,
            'total_paid_amount' => $order->total_paid_amount,
            'total_refund_amount' => $order->total_refund_amount,
            'status' => Payment::PAYMENT_STATUS_PENDING,
            'counter_code' => '',
            'note' => '',
            'currency_id' => 1,
        ];
    }

    public function updatePaymentByCallBack($callBackData)
    {
        $payment = $this->model->where('id', '=', $callBackData['embed_data']['payment_id'])->first();
        $payment->update([
            'status' => $callBackData['amount'] == $payment->total_due_amount ? Payment::PAYMENT_STATUS_PAID : Payment::PAYMENT_STATUS_CANCELED,
        ]);
        return $payment;
    }
}
