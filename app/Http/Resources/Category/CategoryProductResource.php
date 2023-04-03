<?php

namespace App\Http\Resources\Category;

use App\Http\Resources\Configurator\ConfiguratorResource;
use App\Http\Resources\Product\ProductSpecificationValueResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Product */
class CategoryProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'retail_price' => $this->retail_price,
            'in_stock' => $this->in_stock,
            'img' => $this->img,
        ];
    }
}
