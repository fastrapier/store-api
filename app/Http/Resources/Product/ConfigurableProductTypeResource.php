<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\ProductType\Configuration\ConfigurationResource;
use App\Http\Resources\Specification\SpecificationResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\ProductType */
class ConfigurableProductTypeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'configurable' => $this->configurable,

            'configurations' => ConfigurationResource::collection($this->whenLoaded('configurations')),
            'specifications' => SpecificationResource::collection($this->whenLoaded('specifications')),
        ];
    }
}
