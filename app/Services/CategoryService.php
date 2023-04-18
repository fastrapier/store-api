<?php


namespace App\Services;
use App\Models\Category;

interface CategoryService
{
    public function findAll();

    public function findById(int $id);

    public function create(array $validated);

    public function update(array $validated, int $id);

    public function delete(int $id);

    public function deleteByIds(array $ids);
}
