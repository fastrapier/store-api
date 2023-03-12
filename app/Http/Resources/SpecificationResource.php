<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Specification */
class SpecificationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'product_type_id' => $this->product_type_id,

//            'productType' => new ProductTypeResource($this->whenLoaded('productType')),
        ];
    }
}
