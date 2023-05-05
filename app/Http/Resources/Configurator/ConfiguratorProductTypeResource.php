<?php

namespace App\Http\Resources\Configurator;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\ConfiguratorProductType */
class ConfiguratorProductTypeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'base_product_type_id' => $this->product_type->id,
            'title' => $this->product_type->title,
            'products' => ConfiguratorProductResource::collection($this->products)
        ];
    }
}
