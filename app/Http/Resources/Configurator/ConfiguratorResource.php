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
            'product_types' => ConfiguratorProductTypeResource::collection($this->configuratorProductType)
        ];
    }
}
