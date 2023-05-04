<?php

namespace App\Http\Resources\Configurator;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\ConfiguratorProduct */
class ConfiguratorProductResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'base_product_id' => $this->product->id,
            'title' => $this->product->title,
            'price' => $this->product->configurator_price,
        ];
    }
}
