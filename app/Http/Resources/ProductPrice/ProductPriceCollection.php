<?php

namespace App\Http\Resources\ProductPrice;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductPriceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    public $collects = 'App\Http\Resources\ProductPrice\ProductPriceResource';
}
