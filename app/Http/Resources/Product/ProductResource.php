<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\SpecificationValue\ProductSpecificationValueResource;
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
            'retail_price' => $this->retail_price,
            'configurator_price' => $this->configurator_price,
            'in_stock' => $this->in_stock,
            'description' => $this->description,
            'img' => $this->img,
            'created_at' => $this->created_at,
            'product_type_id' => $this->product_type_id,
            'category_id' => $this->category_id,
            'specification_values' => ProductSpecificationValueResource::collection($this->specification_values),
            'available_products' => $this->whenLoaded('availableProducts', function () {
                $available_products = $this->availableProducts;

                $prods = [];

                foreach ($available_products as $available_product)
                {
                    $prods[$available_product->configuration_id][] = $available_product->id;
                }
                return $prods;
            })
        ];
    }
}
