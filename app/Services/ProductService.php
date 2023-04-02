<?php


namespace App\Services;
use App\Models\Product;

interface ProductService
{
    public function store(array $validated);

    public function update(array $validated, Product $product);
}
