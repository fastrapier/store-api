<?php


namespace App\Services;

use App\Models\Product;

interface ProductService
{
    public function findAll();

    public function find(Product $product);

    public function create(array $validated);

    public function update(array $validated, Product $product);

    public function delete(Product $product);

    public function deleteByIds(array $ids);
}
