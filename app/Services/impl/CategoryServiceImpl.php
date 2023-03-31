<?php


namespace App\Services\impl;
use App\Models\Category;
use App\Services\CategoryService;

class CategoryServiceImpl implements CategoryService
{
    public function findAll()
    {
        $categories = Category::with('products')->get();

        return Category::all();
    }

    public function findById(Category $category)
    {
        return $category;
    }

    public function create(array $validated)
    {

        if(isset($validated['parent_id']) && !empty($validated['parent_id']))
        {
            Category::findOrFail($validated['parent_id']);
        }

        $created_category = Category::create($validated);

        return $created_category;
    }

    public function update(array $validated, Category $category)
    {
        $category->update($validated);

        $category->fresh();

        return $category;
    }

    public function delete(Category $category)
    {
        $category->delete();
    }
}
