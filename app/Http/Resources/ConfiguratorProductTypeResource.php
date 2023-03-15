<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Configurator_ProductTypes */
class ConfiguratorProductTypeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'configurator_id' => $this->configurator_id,
            'product_type_id' => new ProductTypeResource($this->product_type),
            'products_count' => $this->products_count,
        ];
    }
}
