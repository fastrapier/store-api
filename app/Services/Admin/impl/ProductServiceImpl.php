<?php

namespace App\Services\Admin\impl;

use App\Http\Resources\Client\Product\ProductCollection;
use App\Http\Resources\Client\Product\SingleProductResource;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductType;
use App\Services\Admin\ProductService;

class ProductServiceImpl implements ProductService
{


    public function update(array $validated, int $id)
    {
        if (isset($validated['category_id'])) {
            Category::findOrFail($validated['category_id']);
        }
        if (isset($validated['product_type_id'])) {
            ProductType::findOrFail($validated['product_type_id']);
        }

        $product = Product::findOrFail($id);

        $product->update($validated);

        $product->fresh();

        return $product;
    }


    public function findAll()
    {
        return Product::all();
    }

    public function findById(int $id)
    {
        return Product::where('id', '=', $id)->with('configurator')->with('specifications_values')->firstOrFail();
    }

    public function create(array $validated)
    {
        Category::findOrFail($validated['category_id']);

        ProductType::findOrFail($validated['product_type_id']);

        return Product::create($validated);
    }

    public function delete(int $id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

    }
}
