<?php

namespace App\Services\Admin\impl;

use App\Http\Resources\Admin\ProductType\ProductTypeCollection;
use App\Http\Resources\Admin\ProductType\SingleProductTypeResource;
use App\Models\ProductType;
use App\Services\Admin\ProductTypeService;

class ProductTypeServiceImpl implements ProductTypeService
{

    public function findAll(): ProductTypeCollection
    {
        return new ProductTypeCollection(ProductType::all());
    }

    public function findById(int $id): SingleProductTypeResource
    {
        $product_type = ProductType::findOrFail($id)->where('id', '=', $id)->with('specifications')->first();

        return new SingleProductTypeResource($product_type);
    }

    public function create(array $validated): SingleProductTypeResource
    {
        $product_type = ProductType::create($validated);

        return new SingleProductTypeResource($product_type);
    }

    public function update(array $validated, int $id): SingleProductTypeResource
    {
        $productType = ProductType::findOrFail($id);

        $productType->update($validated);

        $productType->fresh();

        return new SingleProductTypeResource($productType);
    }

    public function delete(int $id): void
    {
        $productType = ProductType::findOrFail($id);

        $productType->delete();
    }
}
