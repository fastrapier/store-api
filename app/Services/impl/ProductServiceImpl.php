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
    public function update(array $validated, Product $product): ProductResource
    {
        if (isset($validated['category_id'])) {
            Category::findOrFail($validated['category_id']);
        }
        if (isset($validated['product_type_id'])) {
            ProductType::findOrFail($validated['product_type_id']);
        }

        $product = $product->load('specification_values');

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
            $product = $product->fresh();
        }

        return new ProductResource($product);
    }


    public function findAll(): AnonymousResourceCollection
    {
        return ProductResource::collection(Product::all());
    }

    public function create(array $validated): ProductResource
    {
        $specification_values = $validated['specification_values'];

        $product = Product::create($validated);

        foreach ($specification_values as $id => $specification_value) {
            $specification_values[$id]['product_id'] = $product->id;
        }

        $product->specification_values()->createMany($specification_values);

        $product->load(['specification_values', 'availableProducts']);

        return new ProductResource($product);
    }

    public function delete(Product $product): void
    {

        $product->delete();

    }

    public function deleteByIds(array $ids): void
    {
        Product::whereIn('id', $ids)->delete();
    }

    public function find(Product $product): ProductResource
    {
        if($product->productType->configurable)
        {
            $product = $product->load(['availableProducts', 'platform']);
        }

        return new ProductResource($product);
    }
}
