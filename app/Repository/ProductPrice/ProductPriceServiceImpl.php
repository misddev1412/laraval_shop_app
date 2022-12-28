<?php

namespace App\Repository\ProductPrice;

use App\Models\Product;
use App\Models\ProductPrice;
use App\Repository\CrudInterfaceImpl;

class ProductPriceServiceImpl extends CrudInterfaceImpl implements ProductPriceService
{
    public function __construct(ProductPrice $model)
    {
        parent::__construct($model);
    }
}
