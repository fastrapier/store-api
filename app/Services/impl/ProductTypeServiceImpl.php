<?php

namespace App\Services\impl;

use App\Http\Resources\ProductType\ProductTypeResource;
use App\Models\Product;
use App\Models\ProductType;
use App\Services\ProductTypeService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductTypeServiceImpl implements ProductTypeService
{

    public function findAll(): AnonymousResourceCollection
    {
        return ProductTypeResource::collection(ProductType::all());
    }

    public function findById(int $id): ProductTypeResource
    {
        $productType = ProductType::with('specifications')->with('products')->findOrFail($id);

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

    public function delete(int $id): void
    {
        $productType = ProductType::findOrFail($id);

        $productType->delete();
    }

    public function deleteByIds(array $ids): void
    {
        ProductType::whereIn('id', $ids)->delete();
    }
}
