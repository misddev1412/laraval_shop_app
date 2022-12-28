<?php

namespace App\Repository\Product;

use App\Models\Inventory;
use App\Models\Product;
use App\Models\ProductPrice;
use App\Models\Tax;
use App\Repository\CrudInterfaceImpl;

class ProductServiceImpl extends CrudInterfaceImpl implements ProductService
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function show(mixed $id)
    {
        return $this->find($id)
        ->with('prices')
        ->with('user')
        ->with('currentTranslation', function ($query) {
            $result = $query->where('locale', request()->headers->get('X-Locale') ?? app()->getLocale());
            if ($result->count() === 0) {
                $result = $query->orWhere('locale', app()->getLocale());
            }
            return $result;
        })
        ->with('attributes.attribute.currentTranslation', function ($query) {
            $result = $query->where('locale', request()->headers->get('X-Locale') ?? app()->getLocale());
            if ($result->count() === 0) {
                $result = $query->orWhere('locale', app()->getLocale());
            }
            return $result;
        })
        ->first();
    }

    public static function getCurrentPrice($productVariantId, $storeId, $quantity)
    {
        $originalPrice = ProductPrice::where('product_variant_id', $productVariantId)
            ->where('store_id', $storeId)
            ->where('min_quantity', '<=', $quantity)
            ->where('max_quantity', function ($query) use ($quantity) {
                $query->where('max_quantity', '>=', $quantity);
                $query->orWhereNull('max_quantity');
            })
            ->where('valid_from', function ($query) {
                $query->where('valid_from', '<=', now());
                $query->orWhereNull('valid_from');
            })
            ->where('valid_to', function ($query) {
                $query->where('valid_to', '>=', now());
                $query->orWhereNull('valid_to');
            })
            ->where('status', ProductPrice::PRODUCT_PRICE_STATUS_ACTIVE)
            ->orderBy('price', 'ASC')
            ->first();


        return [
            'original_price' => $originalPrice->price,
        ];

    }

    public function checkUnlimitedStock($productId, $productVariantId, $storeId) : bool
    {
        $isUnlimitedStock = Product::find($productId)->is_unlimited_sales;
        $inventory = Inventory::where('product_id', $productId)
            ->where('product_variant_id', $productVariantId)
            ->where('store_id', $storeId)
            ->where('quantity', '>', 0)
            ->first();

        if ($isUnlimitedStock && !$inventory) {
            return true;
        } else if (!$isUnlimitedStock && $inventory) {
            return true;
        } else {
            return false;
        }
    }
}
