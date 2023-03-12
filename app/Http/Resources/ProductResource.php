<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Product */
class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'article' => $this->article,
            'price' => $this->price,
            'in_stock' => $this->in_stock,
            'description' => $this->description,
            'photo' => $this->photo,
            'category_id' => $this->category_id,
            'product_type_id' => $this->product_type_id,
            'specifications_values' => $this->specifications_values
        ];
    }
}
