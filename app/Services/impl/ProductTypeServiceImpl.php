<?php

namespace App\Services\impl;

use App\Http\Resources\ProductType\ProductTypeCollection;
use App\Http\Resources\ProductType\ProductTypeResource;
use App\Models\ProductType;
use App\Services\ProductTypeService;

class ProductTypeServiceImpl implements ProductTypeService
{

    public function findAll(): ProductTypeCollection
    {
        return new ProductTypeCollection(ProductType::all());
    }

    public function findById(int $id): ProductTypeResource
    {
        $productType = ProductType::findOrFail($id)->where('id', '=', $id)->with('specifications')->first();

        return new ProductTypeResource($productType);

    }

    public function create(array $validated): ProductTypeResource
    {
        $created_product_type = ProductType::create($validated);

        return new ProductTypeResource($created_product_type);
    }

    public function update(array $validated, int $id): ProductTypeResource
    {
        $productType = ProductType::findOrFail($id);

        $productType->update($validated);

        $productType->fresh();

        return new ProductTypeResource($productType);
    }

    public function delete(int $id)
    {
        $productType = ProductType::findOrFail($id);

        $productType->delete();
    }
}
