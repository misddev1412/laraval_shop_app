<?php

namespace App\Repository\ProductVariant;

use App\Models\Inventory;
use App\Models\Product;
use App\Models\ProductPrice;
use App\Models\ProductVariant;
use App\Models\Tax;
use App\Repository\CrudInterfaceImpl;

class ProductVariantServiceImpl extends CrudInterfaceImpl implements ProductVariantService
{
    public function __construct(ProductVariant $model)
    {
        parent::__construct($model);
    }

    public function show(mixed $id)
    {
        return $this->find($id)
        ->with('variant')
        ->with('variant.currentTranslation', function ($query) {
            $result = $query->where('locale', request()->headers->get('X-Locale') ?? app()->getLocale());
            if ($result->count() === 0) {
                $result = $query->orWhere('locale', app()->getLocale());
            }
            return $result;
        })
        ->first();
    }
}
