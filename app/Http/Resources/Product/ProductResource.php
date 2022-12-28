<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Attribute\ProductAttributeResource;
use App\Http\Resources\ProductPrice\ProductPriceResource;
use App\Http\Resources\ProductTranslation\ProductTranslationResource;
use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'sku' => $this->sku,
            'name' => $this->currentTranslation->name,
            'description' => $this->currentTranslation->description,
            'status' => $this->status,
            'visibility' => $this->visibility,
            'prices' => ProductPriceResource::collection($this->whenLoaded('prices')),
            'user' => UserResource::make($this->whenLoaded('user')),
            'translation' => ProductTranslationResource::make($this->whenLoaded('currentTranslation')),
            'attributes' => ProductAttributeResource::collection($this->whenLoaded('attributes')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

    public function toShortArray()
    {
        return [
            'id' => $this->id,
            'sku' => $this->sku,
            'name' => $this->currentTranslation->name
        ];
    }



}
