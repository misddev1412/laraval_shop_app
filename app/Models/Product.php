<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public const PRODUCT_STATUS_APPROVED = 'APPROVED';
    public const PRODUCT_STATUS_PENDING = 'PENDING';
    public const PRODUCT_STATUS_REJECTED = 'REJECTED';
    public const PRODUCT_STATUS_DELETED = 'DELETED';
    public const PRODUCT_STATUS_ARCHIVED = 'ARCHIVED';
    public const PRODUCT_STATUS_DRAFT = 'DRAFT';
    public const PRODUCT_VISIBILITY_PRIVATE = 'PRIVATE';
    public const PRODUCT_VISIBILITY_PUBLIC = 'PUBLIC';

    use HasFactory;

    protected $fillable = ['sku', 'user_id', 'rating', 'views', 'status', 'visibility', 'is_unlimited_sales'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function attributes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function translations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProductTranslation::class, 'product_id', 'id');
    }

    public function medias(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProductMedia::class);
    }

    public function scopeIsActive($query)
    {
        return $query->where('status', 'ACTIVE');
    }

    public function scopeIsVisible($query)
    {
        return $query->where('visibility', 'PUBLIC');
    }

    public function inventory(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Inventory::class);
    }

    public function prices(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProductPrice::class);
    }

    public function scopeInStock($query, $storeId, $attributeId = null)
    {
        $query->whereHas('inventory', function ($query) use ($storeId, $attributeId) {
            $query->where('store_id', $storeId);
            if ($attributeId) {
                $query->where('attribute_id', $attributeId);
            }
            $query->where('quantity', '>', 0);
        });
    }

    public function scopeCurrentPrice($query, $storeId, $quantity, $attributeId = null)
    {
        $query->whereHas('prices', function ($query) use ($storeId, $quantity, $attributeId) {
            $query->where('store_id', $storeId);
            if ($attributeId) {
                $query->where('attribute_id', $attributeId);
            }
            $query->where('min_quantity', '<=', $quantity);
            $query->where('max_quantity', function ($query) use ($quantity) {
                $query->where('max_quantity', '>=', $quantity);
                $query->orWhereNull('max_quantity');
            });
            $query->where('valid_from', '<=', now());
            $query->where('valid_to', '>=', now());
            $query->where('status', 'ACTIVE');
        });
    }

    public function currentTranslation()
    {
        return $this->hasOne(ProductTranslation::class, 'product_id', 'id');
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

}
