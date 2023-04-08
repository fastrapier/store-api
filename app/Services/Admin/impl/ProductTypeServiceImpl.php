<?php

namespace App\Services\Admin\impl;

use App\Models\ProductType;
use App\Services\Admin\ProductTypeService;

class ProductTypeServiceImpl implements ProductTypeService
{

    public function findAll()
    {
        return ProductType::all();
    }

    public function findById(int $id)
    {
        return ProductType::findOrFail($id)->where('id', '=', $id)->with('specifications')->first();

    }

    public function create(array $validated)
    {
        return ProductType::create($validated);
    }

    public function update(array $validated, int $id)
    {
        $productType = ProductType::findOrFail($id);

        $productType->update($validated);

        $productType->fresh();

        return $productType;
    }

    public function delete(int $id)
    {
        $productType = ProductType::findOrFail($id);

        $productType->delete();
    }
}
