<?php

namespace App\Http\Resources\SpecificationValue;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\SpecificationValue */
class ProductSpecificationValueResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'specification_id' => $this->specification_id,
            'value' => $this->value,
            'name' => $this->specification->name,
        ];
    }
}
