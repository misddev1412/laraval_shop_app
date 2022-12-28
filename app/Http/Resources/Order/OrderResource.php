<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\Currency\CurrencyResource;
use App\Http\Resources\OrderItem\OrderItemResource;
use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'internal_status' => $this->internal_status,
            'external_status' => $this->external_status,
            'total_original_amount' => $this->total_original_amount,
            'total_tax' => $this->total_tax,
            'total_shipping_cost' => $this->total_shipping_cost,
            'total_discount' => $this->total_discount,
            'total_due_amount' => $this->total_due_amount,
            'total_paid_amount' => $this->total_paid_amount,
            'total_refunded_amount' => $this->total_refunded_amount,
            'total_canceled_amount' => $this->total_canceled_amount,
            'total_items' => $this->total_items,
            'total_items_quantity' => $this->total_items_quantity,
            'total_items_weight' => $this->total_items_weight,
            'currency' => CurrencyResource::make($this->whenLoaded('currency')),
            'weight_unit' => $this->weight_unit,
            'note' => $this->note,
            'shipping_tracking_number' => $this->shipping_tracking_number,
            'user' => UserResource::make($this->whenLoaded('user')),
            'items' => OrderItemResource::collection($this->whenLoaded('items')),
            'payment_info' => $this->payment_info,
            'payment' => $this->payment,
        ];
    }
}
