<?php

namespace App\Services;

use App\Models\ProductType;

interface ProductTypeService
{
    public function findAll();

    public function findById(ProductType $productType);

    public function create(array $validated);

    public function update(array $validated, ProductType $productType);

    public function delete(ProductType $productType);

    public function deleteByIds(array $ids);
}
