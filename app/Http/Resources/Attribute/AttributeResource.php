<?php

namespace App\Http\Resources\Attribute;

use Illuminate\Http\Resources\Json\JsonResource;

class AttributeResource extends JsonResource
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
            'scope' => $this->scope,
            'type' => $this->type,
            'translation' => AttributeTranslationResource::make($this->whenLoaded('currentTranslation')),
            'group' => AttributeGroupResource::make($this->whenLoaded('group')),
        ];
    }
}
