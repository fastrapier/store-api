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

        $product = Product::with('specification_values')->findOrFail($id);

        $isUpdated = $product->update($validated);

        if (!empty($validated['specification_values'])) {
            $isUpdated = true;

            foreach ($validated['specification_values'] as $key => $value) {
                $product->specification_values()->where([
                    ['specification_id', "=", $value['specification_id']],
                    ['product_id', "=", $product->id]
                ])->updateOrCreate(['specification_id' => $value['specification_id'], 'value' => $value['value'], 'product_id' => $product->id]);
            }
        }

        if ($isUpdated) {
            $product = Product::with('specification_values')->findOrFail($id);
        }

        return new ProductResource($product);
    }


    public function findAll(): AnonymousResourceCollection
    {
        $product = Product::with('configurator')->get();

        return ProductResource::collection($product);
    }

    public function findById(int $id): ProductResource
    {
        $product = Product::where('id', '=', $id)->with('configurator')->with('specification_values')->firstOrFail();

        return new ProductResource($product);
    }

    public function create(array $validated): ProductResource
    {
        Category::findOrFail($validated['category_id']);

        ProductType::findOrFail($validated['product_type_id']);

        $specification_values = $validated['specification_values'];

        $product = Product::create($validated);

        foreach ($specification_values as $id => $specification_value) {
            $specification_values[$id]['product_id'] = $product->id;
        }

        $product->specification_values()->createMany($specification_values);

        $product = $product->with('specification_values')->with('configurator')->findOrFail($product->id);

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
