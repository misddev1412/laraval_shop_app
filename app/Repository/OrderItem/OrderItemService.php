<?php

namespace App\Repository\OrderItem;
use App\Models\OrderItem;
use App\Repository\CrudInterface;

interface OrderItemService extends CrudInterface
{
    public function buildOrderItemModel($productId, $productVariantId, $quantity) : OrderItem;
}
