<?php

namespace App\Http\Resources\Admin\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Product */
class SingleProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'success' => true,
            'data' => [
                'id' => $this->id,
                'title' => $this->title,
                'article' => $this->article,
                'retail_price' => $this->retail_price,
                'configurator_price' => $this->configurator_price,
                'in_stock' => $this->in_stock,
                'description' => $this->description,
                'img' => $this->img,
                'category_id' => $this->category_id,
                'product_type_id' => $this->product_type_id,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'specifications_values_count' => $this->specifications_values_count,
            ]
        ];
    }
}
