<?php

namespace App\Services\impl;

use App\Http\Resources\Product\ProductResource;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductType;
use App\Services\ProductService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductServiceImpl implements ProductService
{
    public function update(array $validated, int $id): ProductResource
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

        return new ProductResource($product);
    }


    public function findAll(): AnonymousResourceCollection
    {
        $data = Product::all();

        return ProductResource::collection($data);
    }

    public function findById(int $id): ProductResource
    {
        $product = Product::where('id', '=', $id)->with('configurator')->with('specifications_values')->firstOrFail();

        return new ProductResource($product);
    }

    public function create(array $validated)
    {
        Category::findOrFail($validated['category_id']);

        ProductType::findOrFail($validated['product_type_id']);

        $specification_values = $validated['specification_values'];

        $product = Product::create($validated);

        foreach ($specification_values as $id => $specification_value) {
            $specification_values[$id]['product_id'] = $product->id;
        }

        $product->specifications_values()->createMany($specification_values);

        $product->with('specifications_values');

        return new ProductResource($product);
    }

    public function delete(int $id): void
    {
        $product = Product::findOrFail($id);

        $product->delete();

    }

    public function deleteByIds(array $ids): void
    {
        Product::whereIn('id', $ids)->delete();
    }
}
