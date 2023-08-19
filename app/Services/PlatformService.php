<?php

namespace App\Services;

use App\Models\Product;

interface PlatformService
{
    public function store(array $validated, Product $product);
}
