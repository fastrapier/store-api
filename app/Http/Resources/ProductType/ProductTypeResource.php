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
            'configurable' => $this->configurable,
            'specification' => $this->whenLoaded('specifications', function () {
                return SpecificationResource::collection($this->specifications);
            }),
            'products' => $this->whenLoaded('products', function () {
                return ProductResource::collection($this->products);
            }),
            'configurations' => $this->whenLoaded('configurations', function () {
                return $this->configurations;
            })
        ];
    }
}
