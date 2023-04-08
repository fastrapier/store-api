<?php

namespace App\Services\Admin\impl;

use App\Http\Resources\Admin\Product\ProductCollection;
use App\Http\Resources\Admin\Product\SingleProductResource;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductType;
use App\Services\Admin\ProductService;

class ProductServiceImpl implements ProductService
{
    public function update(array $validated, int $id): SingleProductResource
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

        return new SingleProductResource($product);
    }


    public function findAll(): ProductCollection
    {
        return new ProductCollection(Product::all());
    }

    public function findById(int $id): SingleProductResource
    {
        $product = Product::where('id', '=', $id)->with('configurator')->with('specifications_values')->firstOrFail();

        return new SingleProductResource($product);
    }

    public function create(array $validated): SingleProductResource
    {
        Category::findOrFail($validated['category_id']);

        ProductType::findOrFail($validated['product_type_id']);

        $product = Product::create($validated);

        return new SingleProductResource($product);
    }

    public function delete(int $id): void
    {
        $product = Product::findOrFail($id);

        $product->delete();
    }
}
