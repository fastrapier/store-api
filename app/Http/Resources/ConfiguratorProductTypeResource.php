<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\ConfiguratorProductType */
class ConfiguratorProductTypeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->product_type->title,
            'products' => $this->products
        ];
    }
}
