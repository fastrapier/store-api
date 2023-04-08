<?php

namespace App\Http\Resources\Client\Category;

use App\Http\Resources\Client\Product\PaginatedProductCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Category */
class SingleCategoryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'success' => true,
            'data' => [
                'id' => $this->id,
                'name' => $this->name,
                'description' => $this->description,
                'parent_id' => $this->parent_id,
                'products' => $this->products,
            ]
        ];
    }
}
