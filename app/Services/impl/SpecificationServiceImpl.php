<?php

namespace App\Services\impl;

use App\Http\Resources\Specification\SpecificationCollection;
use App\Http\Resources\Specification\SingleSpecificationResource;
use App\Models\ProductType;
use App\Models\Specification;
use App\Services\SpecificationService;

class SpecificationServiceImpl implements SpecificationService
{
    public function findAll(): SpecificationCollection
    {
        return new SpecificationCollection(Specification::all());
    }

    public function findById(int $id): SingleSpecificationResource
    {
        $specification = Specification::findOrFail($id)->where('id', '=', $id)->first();

        return new SingleSpecificationResource($specification);
    }

    public function create(array $validated): SingleSpecificationResource
    {
        if (isset($validated['product_type_id'])) {
            ProductType::findOrFail($validated['product_type_id']);
        }
        return new SingleSpecificationResource(Specification::create($validated));
    }

    public function update(array $validated, int $id): SingleSpecificationResource
    {
        if (isset($validated['product_type_id'])) {
            ProductType::findOrFail($validated['product_type_id']);
        }
        $specification = Specification::findOrFail($id);

        $specification->update($validated);

        $specification->fresh();

        return new SingleSpecificationResource($specification);
    }

    public function delete(int $id)
    {
        $category = Specification::findOrFail($id);

        $category->delete();
    }
}
