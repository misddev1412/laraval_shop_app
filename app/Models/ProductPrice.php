<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    use HasFactory;

    const PRODUCT_PRICE_STATUS_ACTIVE = 'ACTIVE';
    protected $fillable = [
        'product_id',
        'price',
        'product_variant_id',
        'store_id',
        'currency_id',
        'type',
        'valid_from',
        'valid_to',
        'min_quantity',
        'max_quantity',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
