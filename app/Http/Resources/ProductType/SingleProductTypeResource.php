<?php

namespace App\Http\Resources\ProductType;

use App\Http\Resources\Specification\SpecificationResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\ProductType */
class SingleProductTypeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'success' => true,
            'data' => [
                'id' => $this->id,
                'title' => $this->title,
            ]
        ];
    }
}
