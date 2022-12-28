<?php

namespace App\Repository\Product;
use App\Repository\CrudInterface;

interface ProductService extends CrudInterface
{
    public function show(mixed $id);
    public static function getCurrentPrice($productVariantId, $storeId, $quantity);
    public function checkUnlimitedStock($productId, $productVariantId, $storeId) : bool;
}
