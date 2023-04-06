<?php

namespace App\Http\Resources\SpecificationValue;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\SpecificationValue */
class SpecificationValueResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'value' => $this->value,
            'product_id' => $this->product_id,
            'specification_id' => $this->specification_id,
        ];
    }
}
