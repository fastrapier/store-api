<?php

namespace App\Http\Resources\Admin\Category;

use App\Http\Resources\Client\Category\CategoryCollection;
use App\Http\Resources\Client\Product\PaginatedProductCollection;
use App\Http\Resources\Client\User\UserResource;
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
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'children_count' => $this->children_count,
                'products_count' => $this->products_count,

                'parent_id' => $this->parent_id,

                'children' => CategoryCollection::collection($this->whenLoaded('children')),
                'parent' => new UserResource($this->whenLoaded('parent')),
                'products' => PaginatedProductCollection::collection($this->whenLoaded('products')),
            ]
        ];
    }
}
