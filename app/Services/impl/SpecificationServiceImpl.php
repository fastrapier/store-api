<?php

namespace App\Services\impl;

use App\Http\Resources\Specification\SpecificationResource;
use App\Models\ProductType;
use App\Models\Specification;
use App\Services\SpecificationService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SpecificationServiceImpl implements SpecificationService
{
    public function findAll(): AnonymousResourceCollection
    {
        return SpecificationResource::collection(Specification::all());
    }

    public function findById(int $id): SpecificationResource
    {
        $specification = Specification::findOrFail($id)->where('id', '=', $id)->first();

        return new SpecificationResource($specification);
    }

    public function create(array $validated): SpecificationResource
    {
        if (isset($validated['product_type_id'])) {
            ProductType::findOrFail($validated['product_type_id']);
        }
        return new SpecificationResource(Specification::create($validated));
    }

    public function update(array $validated, int $id): SpecificationResource
    {
        if (isset($validated['product_type_id'])) {
            ProductType::findOrFail($validated['product_type_id']);
        }
        $specification = Specification::findOrFail($id);

        $specification->update($validated);

        $specification->fresh();

        return new SpecificationResource($specification);
    }

    public function delete(int $id): void
    {
        $category = Specification::findOrFail($id);

        $category->delete();
    }
}
