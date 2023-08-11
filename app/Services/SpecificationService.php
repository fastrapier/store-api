<?php

namespace App\Services;

use App\Models\ProductType;
use App\Models\Specification;

interface SpecificationService
{
    public function findAll();

    public function findById(Specification $specification);

    public function create(array $validated, ProductType $productType);

    public function update(array $validated, Specification $specification);

    public function delete(Specification $specification);
}
