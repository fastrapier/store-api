<?php

namespace App\Services;

use App\Models\Product;

interface AvailableProductService
{
    public function store(array $validated, Product $product);

}
