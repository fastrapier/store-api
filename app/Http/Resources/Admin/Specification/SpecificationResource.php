<?php

namespace App\Http\Resources\Admin\Specification;

use App\Http\Resources\Admin\ProductType\ProductTypeResource;
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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'product_type_id' => $this->product_type_id,

            'productType' => new ProductTypeResource($this->whenLoaded('productType')),
        ];
    }
}
