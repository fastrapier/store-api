<?php

namespace App\Http\Resources\ProductType;

use App\Http\Resources\Specification\SpecificationResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\ProductType */
class ProductTypeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'specification' => $this->whenLoaded('specifications', function () {
                return SpecificationResource::collection($this->specifications);
            })
        ];
    }
}
