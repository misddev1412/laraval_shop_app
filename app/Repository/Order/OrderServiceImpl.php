<?php

namespace App\Repository\Order;

use App\Enumeration\StatusCode;
use App\Exceptions\GlobalException;
use App\Helper\OrderHelper;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductPrice;
use App\Models\Tax;
use App\Repository\CrudInterfaceImpl;
use App\Repository\OrderItem\OrderItemService;

class OrderServiceImpl extends CrudInterfaceImpl implements OrderService
{
    private OrderItemService $orderItemService;
    public function __construct(Order $model, OrderItemService $orderItemService)
    {
        parent::__construct($model);
        $this->orderItemService = $orderItemService;
    }

    public function create(array $data)
    {
        $oderItems = [];
        foreach ($data['order_items'] as $orderItem) {
            $oderItems[] = $this->orderItemService->buildOrderItemModel(
                $orderItem['product_id'],
                $orderItem['product_variant_id'],
                $orderItem['quantity']
            );
        }

        $totalPrice = array_sum(array_column($oderItems, 'total_price'));
        $prices = [
            'total_original_amount' => $totalPrice,
            'total_discount' => 0,
            'total_tax' => 0,
            'total_due_amount' => $totalPrice,
        ];

        $data = [
            ...$data,
            'internal_status' => Order::ORDER_INTERNAL_STATUS_PENDING,
            'external_status' => Order::ORDER_EXTERNAL_STATUS_PENDING,
            'code' => OrderHelper::generateOrderNumber($data['store_id']),
            'order_items' => $oderItems,
            'total_original_amount' => $prices['total_original_amount'],
            'total_items' => count($oderItems),
            'total_items_quantity' => array_sum(array_column($oderItems, 'quantity')),
            'total_due_amount' => $prices['total_due_amount'],
//            'total' => $this->calculateTotal($data['product_id'], $data['quantity'], $data['tax_id'])
        ];

        $order = parent::create($data);
        $order->items()->saveMany($oderItems);
        return $order;
    }

    /**
     * @throws GlobalException
     */
    public function updateStatus(int $id, array $request)
    {
        $order = $this->find($id)->first();
        switch ($request['status']) {
            case Order::ORDER_INTERNAL_STATUS_PROCESSING:
                if ($order->internal_status == Order::ORDER_INTERNAL_STATUS_PENDING) {
                    $order->internal_status = Order::ORDER_INTERNAL_STATUS_PROCESSING;
                    $order->external_status = Order::ORDER_EXTERNAL_STATUS_PROCESSING;
                    $order->save();
                } else {
                    throw new GlobalException(StatusCode::BAD_REQUEST->value, __('order.status_not_allowed', ['status' => $order->internal_status]));
                }
                break;
            case Order::ORDER_INTERNAL_STATUS_DELIVERED:
                if ($order->internal_status == Order::ORDER_INTERNAL_STATUS_PROCESSING) {
                    $order->internal_status = Order::ORDER_INTERNAL_STATUS_DELIVERED;
                    $order->external_status = Order::ORDER_EXTERNAL_STATUS_DELIVERED;
                    $order->save();
                } else {
                    throw new GlobalException(StatusCode::BAD_REQUEST->value, __('order.status_not_allowed', ['status' => $order->internal_status]));
                }
                break;
            case Order::ORDER_INTERNAL_STATUS_CANCELLED:
                if ($order->internal_status == Order::ORDER_INTERNAL_STATUS_PENDING) {
                    $order->internal_status = Order::ORDER_INTERNAL_STATUS_CANCELLED;
                    $order->external_status = Order::ORDER_EXTERNAL_STATUS_CANCELLED;
                    $order->save();
                } else {
                    throw new GlobalException(StatusCode::BAD_REQUEST->value, __('order.status_not_allowed', ['status' => $order->internal_status]));
                }
                break;
            case Order::ORDER_INTERNAL_STATUS_REFUNDED:
                if ($order->internal_status == Order::ORDER_INTERNAL_STATUS_DELIVERED) {
                    $order->internal_status = Order::ORDER_INTERNAL_STATUS_REFUNDED;
                    $order->external_status = Order::ORDER_EXTERNAL_STATUS_REFUNDED;
                    $order->save();
                } else {
                    throw new GlobalException(StatusCode::BAD_REQUEST->value, __('order.status_not_allowed', ['status' => $order->internal_status]));
                }
                break;
            default:
                throw new GlobalException(StatusCode::BAD_REQUEST->value, __('order.status_not_found'));
        }

        return $order;
    }
}
