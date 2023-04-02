<?php

namespace App\Services\impl;

use App\Http\Resources\Product\ProductResource;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductType;
use App\Services\ProductService;

class ProductServiceImpl implements ProductService
{

    public function store(array $validated): ProductResource
    {
        Category::findOrFail($validated['category_id']);

        ProductType::findOrFail($validated['product_type_id']);

        return new ProductResource(Product::create($validated));
    }

    public function update(array $validated, Product $product): ProductResource
    {
        if(isset($validated['category_id']))
        {
            Category::findOrFail($validated['category_id']);
        }
        if(isset($validated['product_type_id']))
        {
            ProductType::findOrFail($validated['product_type_id']);
        }

        $product->update($validated);

        return new ProductResource($product);
    }


}
