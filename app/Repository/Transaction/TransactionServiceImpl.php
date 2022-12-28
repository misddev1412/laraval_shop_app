<?php

namespace App\Repository\Transaction;

use App\Enumeration\StatusCode;
use App\Exceptions\GlobalException;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Transaction;
use App\Repository\CrudInterfaceImpl;
use App\Repository\Order\OrderService;
use Illuminate\Support\Str;

class TransactionServiceImpl extends CrudInterfaceImpl implements TransactionService
{
    private OrderService $orderService;
    public function __construct(
        Transaction $model,
        OrderService $orderService,
    )
    {
        $this->model = $model;
        $this->orderService = $orderService;
    }

  public function createTransactionByCallBack($callBackData) : void {
        $order = $this->orderService->where('code', '=', $callBackData['order_code'])->first();
        if (empty($order)) {
            throw new GlobalException(StatusCode::NOT_FOUND->value, 'Order not found');
        }
        $transaction = [
            'code' => Str::upper(Str::random(12) . Str::uuid()),
            'payment_id' => $callBackData['embed_data']['payment_id'],
            'from_user_id' => $callBackData['embed_data']['from_user_id'],
            'to_user_id' => $callBackData['embed_data']['to_user_id'],
            'from_user_type' => $callBackData['embed_data']['from_user_type'],
            'to_user_type' => $callBackData['embed_data']['to_user_type'],
            'status' => $callBackData['amount'] == $order->total_due_amount ? Transaction::SUCCESS : Transaction::FAILED,
            'third_party_transaction_id' => $callBackData['transaction_id'],
            'app_id' => $callBackData['app_id'],
            'amount' => $callBackData['amount'],
            'fee' => $callBackData['fee'] ?? 0,
            'total_amount' => $callBackData['amount'] + ($callBackData['fee'] ?? 0),
            'note' => $callBackData['embed_data']['note'] ?? '',
            'type' => $callBackData['embed_data']['type'],
            'payment_method' => $callBackData['embed_data']['payment_method'],
            'payment_detail_method' => $callBackData['payment_detail_method'],
            'entry_type' => $callBackData['embed_data']['entry_type'],
        ];
        //Double entry transaction
        $this->create($transaction);
        $this->create(
            [
                ...$transaction,
                'from_user_id' => $callBackData['embed_data']['to_user_id'],
                'to_user_id' => $callBackData['embed_data']['from_user_id'],
                'from_user_type' => $callBackData['embed_data']['to_user_type'],
                'to_user_type' => $callBackData['embed_data']['from_user_type'],
                'entry_type' => Transaction::ENTRY_TYPE_DEBIT,
            ]
        );
    }

}
