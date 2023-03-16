<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Configurator */
class ConfiguratorResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'product_types' => ConfiguratorProductTypeResource::collection($this->configuratorProductType)
        ];
    }
}
