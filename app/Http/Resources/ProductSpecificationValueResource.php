<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\SpecificationValue */
class ProductSpecificationValueResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'value' => $this->value,
            'title' => $this->specification->name,
        ];
    }
}
