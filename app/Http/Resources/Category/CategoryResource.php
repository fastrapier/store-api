<?php

namespace App\Http\Resources\Category;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use function PHPUnit\Framework\isNull;

/** @mixin \App\Models\Category */
class CategoryResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return
            [
                'id' => $this->id,
                'name' => $this->name,
                'description' => $this->description,
                'parent_id' => $this->parent_id,
                'products_count' => $this->whenCounted('products')
            ];
    }
}
