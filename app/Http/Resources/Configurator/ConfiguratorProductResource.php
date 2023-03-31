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
            'title' => $this->product->title,
            'price' => $this->product->configurator_price,
        ];
    }
}
