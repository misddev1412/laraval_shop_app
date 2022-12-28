<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    const PAYMENT_STATUS_PENDING = 'PENDING';
    const TRANSACTION_TYPE_PAYMENT = 'PAYMENT';
    const PAYMENT_STATUS_CANCELED = 'CANCELED';
    const PAYMENT_STATUS_PAID = 'PAID';
    protected $fillable = [
        'order_id',
        'user_id',
        'payment_method_id',
        'payment_method_detail_id',
        'total_refunded_amount',
        'total_canceled_amount',
        'total_tax',
        'total_shipping_cost',
        'total_discount',
        'total_original_amount',
        'total_paid_amount',
        'total_due_amount',
        'status',
        'counter_code',
        'note',
        'staff_id',
        'currency_id'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
