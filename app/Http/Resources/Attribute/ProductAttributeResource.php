<?php

namespace App\Http\Resources\Attribute;

use App\Http\Resources\Product\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductAttributeResource extends JsonResource
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
            'value' => $this->value,
            'product' => ProductResource::make($this->whenLoaded('product')),
            'attribute' => AttributeResource::make($this->whenLoaded('attribute')),
        ];
    }
}
