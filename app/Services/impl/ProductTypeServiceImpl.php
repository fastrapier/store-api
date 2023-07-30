<?php

namespace App\Services\impl;

use App\Http\Resources\ProductType\ProductTypeResource;
use App\Models\ProductType;
use App\Services\ProductTypeService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductTypeServiceImpl implements ProductTypeService
{

    public function findAll(): AnonymousResourceCollection
    {
        return ProductTypeResource::collection(ProductType::all());
    }

    public function findById(ProductType $productType): ProductTypeResource
    {
        return new ProductTypeResource($productType->with('specifications')->with('products'));
    }

    public function create(array $validated): ProductTypeResource
    {
        $created_product_type = ProductType::create($validated);

        return new ProductTypeResource($created_product_type);
    }

    public function update(array $validated, ProductType $productType): ProductTypeResource
    {
        $productType->update($validated);

        $productType->fresh();

        return new ProductTypeResource($productType);
    }

    public function delete(ProductType $productType): void
    {
        $productType->delete();
    }

    public function deleteByIds(array $ids): void
    {
        ProductType::whereIn('id', $ids)->delete();
    }
}
