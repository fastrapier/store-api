<?php

namespace App\Http\Resources\ProductType\Configuration;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Configuration */
class ConfigurationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'configuration_id' => $this->id,
            'max_count' => $this->max_count,
            'quantity_of_divided_item' => $this->quantity_of_divided_item,
            'is_divided' => $this->is_divided,
            'product_type' => [
                'configuration_product_type_id' => $this->selectedProductType->id,
                'title' => $this->selectedProductType->title,
                'configurable' => $this->selectedProductType->configurable
            ]
        ];
    }
}
