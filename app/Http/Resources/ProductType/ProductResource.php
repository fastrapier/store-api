<?php

namespace App\Http\Resources\ProductType;

use App\Http\Resources\Configurator\ConfiguratorResource;
use App\Http\Resources\SpecificationValue\ProductSpecificationValueResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Product */
class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'configurator_price' => $this->configurator_price,
        ];
    }
}
