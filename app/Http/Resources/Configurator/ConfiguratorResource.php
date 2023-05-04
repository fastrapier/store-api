<?php

namespace App\Http\Resources\Configurator;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Configurator */
class ConfiguratorResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'product_types' => $this->configuratorProductType->map(function ($configurator_prod) {
                return [
                    'id' => $configurator_prod->id,
                    'name' => $configurator_prod->product_type->title,
                    'products' => ConfiguratorProductResource::collection($configurator_prod->products)
                ];
            }),
        ];
    }
}
