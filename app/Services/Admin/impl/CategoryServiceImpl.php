<?php


namespace App\Services\Admin\impl;

use App\Models\Category;
use App\Services\Admin\CategoryService;

class CategoryServiceImpl implements CategoryService
{
    public function findAll()
    {
        return Category::all();
    }

    public function findById(int $id)
    {
        return Category::findOrFail($id);
    }

    public function create(array $validated)
    {
        if (isset($validated['parent_id']) && !empty($validated['parent_id'])) {
            Category::findOrFail($validated['parent_id']);
        }
        return Category::create($validated);
    }

    public function update(array $validated, int $id)
    {
        $category = Category::findOrFail($id);

        $category->update($validated);

        $category->fresh();

        return $category;
    }

    public function delete(int $id)
    {
        $category = Category::findOrFail($id);

        $category->delete();
    }
}
