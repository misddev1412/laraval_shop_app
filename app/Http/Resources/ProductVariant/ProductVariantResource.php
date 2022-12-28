<?php

namespace App\Http\Resources\ProductVariant;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductVariantResource extends JsonResource
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
//            'name' => $this->whenLoaded('variant')->currentTranslation->name,
        ];
    }

    public function toShortArray()
    {
        return [
            'id' => $this->id,
            'value' => $this->value,
            'name' => $this->whenLoaded('variant')->currentTranslation->name,
        ];
    }
}
