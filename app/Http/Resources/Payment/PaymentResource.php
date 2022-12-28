<?php

namespace App\Http\Resources\Payment;

use App\Http\Resources\Currency\CurrencyResource;
use App\Http\Resources\PaymentMethod\PaymentMethodResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
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
            'order' => $this->whenLoaded('order'),
            'user' => $this->whenLoaded('user'),
            'payment_method' => PaymentMethodResource::make($this->whenLoaded('paymentMethod')),
            'total_refund_amount' => $this->total_refund_amount,
            'total_canceled_amount' => $this->total_canceled_amount,
            'total_tax' => $this->total_tax,
            'total_shipping_cost' => $this->total_shipping_cost,
            'total_discount' => $this->total_discount,
            'total_original_amount' => $this->total_original_amount,
            'total_paid_amount' => $this->total_paid_amount,
            'total_due_amount' => $this->total_due_amount,
            'status' => $this->status,
            'counter_code' => $this->counter_code,
            'note' => $this->note,
            'staff_id' => $this->staff_id,
            'currency' => CurrencyResource::make($this->whenLoaded('currency')),
        ];
    }
}
