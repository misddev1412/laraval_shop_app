<?php

namespace App\Repository\OrderItem;

use App\Enumeration\StatusCode;
use App\Helper\OrderHelper;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductPrice;
use App\Models\Tax;
use App\Repository\CrudInterfaceImpl;
use App\Repository\OrderItem\OrderItemService;

class OrderItemServiceImpl extends CrudInterfaceImpl implements OrderItemService
{
    public function __construct(OrderItem $model)
    {
        parent::__construct($model);
    }

    /**
     * @throws \Exception
     */
    public function buildOrderItemModel($productId, $productVariantId, $quantity): OrderItem
    {
        $product = Product::find($productId);
        if (!$product) {
            throw new \Exception('Product not found', StatusCode::PRODUCT_NOT_FOUND);
        }

        $productPrice = ProductPrice::where('product_id', $product->id)->where('product_variant_id', $productVariantId)->first();
        if ($productPrice == null) {
            throw new \Exception(__('Product price not found'), StatusCode::PRODUCT_PRICE_NOT_FOUND);
        }

        $productVariant = $product->variants()->find($productVariantId);
        if ($productVariant == null) {
            throw new \Exception(__('Product variant not found'), StatusCode::PRODUCT_VARIANT_NOT_FOUND);
        }

        $orderItem = new OrderItem();
        $orderItem->product_id = $productId;
        $orderItem->product_variant_id = $productVariantId;
        $orderItem->quantity = $quantity;
        $orderItem->unit_price = $productPrice->price;
        $orderItem->total_price = $productPrice->price * $quantity;
        $orderItem->variant_name = 'TEST';
        $orderItem->variant_value = $productVariant->value;
        $orderItem->name = $product->currentTranslation->name;
        $orderItem->sku = $product->sku;

        return $orderItem;
    }
}
