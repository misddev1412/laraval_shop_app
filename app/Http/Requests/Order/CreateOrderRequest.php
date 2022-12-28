<?php

namespace App\Http\Requests\Order;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends BaseRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() : array
    {
        return [
            'note' => 'string',
            'lead_source' => 'string',
            'referral_id' => 'integer',
            'user_id' => 'integer|required|exists:users,id',
            'store_id' => 'integer|required',
            'currency_id' => 'integer|required',
            'payment_method_id' => 'integer|required',
            'order_items' => 'array|required',
            'order_items.*.product_id' => 'integer|required|exists:products,id',
            'order_items.*.quantity' => 'integer|required',
            'order_items.*.product_variant_id' => 'integer|exists:product_variants,id'
        ];
    }
}
