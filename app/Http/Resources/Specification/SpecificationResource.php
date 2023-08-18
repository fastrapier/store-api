<?php

namespace App\Http\Resources\Specification;

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
//            'product_type_id' => $this->productType->id,
            'is_active' => $this->is_active,
            'position' => $this->position
        ];
    }
}
