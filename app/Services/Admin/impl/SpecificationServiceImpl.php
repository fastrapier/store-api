<?php

namespace App\Services\Admin\impl;

use App\Models\ProductType;
use App\Models\Specification;
use App\Services\Admin\SpecificationService;

class SpecificationServiceImpl implements SpecificationService
{
    public function findAll()
    {
        return Specification::all();
    }

    public function findById(int $id)
    {
        return Specification::findOrFail($id)->where('id', '=', $id)->first();
    }

    public function create(array $validated)
    {
        if (isset($validated['product_type_id'])) {
            ProductType::findOrFail($validated['product_type_id']);
        }
        return Specification::create($validated);
    }

    public function update(array $validated, int $id)
    {
        if (isset($validated['product_type_id'])) {
            ProductType::findOrFail($validated['product_type_id']);
        }
        $specification = Specification::findOrFail($id);

        $specification->update($validated);

        $specification->fresh();

        return $specification;
    }

    public function delete(int $id)
    {
        $category = Specification::findOrFail($id);

        $category->delete();
    }
}
