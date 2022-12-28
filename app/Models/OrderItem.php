<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    protected $fillable = [
        'order_id',
        'product_id',
        'variant_id',
        'product_variant_id',
        'name',
        'sku',
        'unit_price',
        'variant_name',
        'variant_value',
        'quantity',
        'total_price',
        'total_tax',
        'total_discount',
        'total_due_amount',
    ];

    //Set mutator for total_due_amount = unit_price * quantity - (total_discount + total_tax)
    public function setTotalDueAmountAttribute($value)
    {
        $this->attributes['total_due_amount'] = $this->unit_price * $this->quantity - ($this->total_discount + $this->total_tax);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }


}
