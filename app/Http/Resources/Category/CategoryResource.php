<?php

namespace App\Http\Resources\Category;

use App\Http\Resources\Product\ProductResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Category */
class CategoryResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return
            [
                'id' => $this->id,
                'name' => $this->name,
                'parent_id' => $this->parent_id,
                'img' => $this->img,
                'products_count' => $this->whenCounted('products'),
                'products' => $this->whenLoaded('products', function () {
                    $products = $this->products()->paginate();
                    $products->data = ProductResource::collection($products);
                    return $products;
                })
            ];
    }
}
