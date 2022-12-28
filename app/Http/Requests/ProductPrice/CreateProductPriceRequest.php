<?php

namespace App\Http\Requests\ProductPrice;


use App\Http\Requests\BaseRequest;

class CreateProductPriceRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'attribute_id' => 'required|integer|exists:attributes,id',
            'store_id' => 'required|integer',
            'currency_id' => 'required|integer',
            'price' => 'required|numeric',
            'type' => 'required|string|in:REGULAR,DISCOUNT',
            'valid_from' => 'datetime',
            'valid_to' => 'datetime',
            'min_quantity' => 'required|integer',
            'max_quantity' => 'integer',
            'status' => 'string|in:ACTIVE,INACTIVE',
        ];
    }
}
