<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    //Internal Order Status
    public const ORDER_INTERNAL_STATUS_PENDING = 'PENDING';
    public const ORDER_INTERNAL_STATUS_PROCESSING = 'PROCESSING';
    public const ORDER_INTERNAL_STATUS_DELIVERED = 'DELIVERED';
    public const ORDER_INTERNAL_STATUS_CANCELLED = 'CANCELLED';
    public const ORDER_INTERNAL_STATUS_REFUNDED = 'REFUNDED';
    //External Order Status
    public const ORDER_EXTERNAL_STATUS_PENDING = 'PENDING';
    public const ORDER_EXTERNAL_STATUS_PROCESSING = 'PROCESSING';
    public const ORDER_EXTERNAL_STATUS_DELIVERED = 'DELIVERED';
    public const ORDER_EXTERNAL_STATUS_CANCELLED = 'CANCELLED';
    public const ORDER_EXTERNAL_STATUS_REFUNDED = 'REFUNDED';

    protected $fillable = [
        'code',
        'user_id',
        'internal_status',
        'external_status',
        'payment_id',
        'total_original_amount',
        'total_tax',
        'total_shipping_cost',
        'total_discount',
        'total_due_amount',
        'total_paid_amount',
        'total_refunded_amount',
        'total_canceled_amount',
        'currency_id',
        'total_items',
        'total_items_quantity',
        'total_items_weight',
        'weight_unit',
        'shipping_method_id',
        'shipping_unit_id',
        'note',
        'shipping_tracking_number',
        'source',
        'lead_source',
        'referral_id',
        'store_id',
        'created_by',
        'staff_id',
        'total_voucher_redemptions',
        'updated_by',
        'deleted_by'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function shippingMethod()
    {
        return $this->belongsTo(ShippingMethod::class);
    }

    public function shippingUnit()
    {
        return $this->belongsTo(ShippingUnit::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function refunds()
    {
        return $this->hasMany(Refund::class);
    }

}
