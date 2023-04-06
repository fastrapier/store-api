<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Configurator\ConfiguratorResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Product */
class PaginatedProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'article' => $this->article,
            'retail_price' => $this->retail_price,
            'in_stock' => $this->in_stock,
            'img' => $this->img,
            'created_at' => $this->created_at,
        ];
    }
}
