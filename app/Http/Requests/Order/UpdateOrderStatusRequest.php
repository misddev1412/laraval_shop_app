<?php

namespace App\Http\Requests\Order;

use App\Http\Requests\BaseRequest;

class UpdateOrderStatusRequest extends BaseRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() : array
    {
        return [
            'status' => 'required|in:PENDING,PROCESSING,DELIVERED,CANCELLED,REFUNDED',
        ];
    }
}
