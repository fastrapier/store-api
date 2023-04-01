<?php


namespace App\Services\impl;

use App\Http\Resources\Category\CategoryCollection;
use App\Http\Resources\Category\SingleCategoryResource;
use App\Models\Category;
use App\Services\CategoryService;

class CategoryServiceImpl implements CategoryService
{
    public function findAll(): CategoryCollection
    {
        return new CategoryCollection(Category::withCount('products')->get());
    }

    public function findById(Category $category): SingleCategoryResource
    {
        return new SingleCategoryResource($category->loadCount('products'));
    }

    public function create(array $validated): SingleCategoryResource
    {

        if (isset($validated['parent_id']) && !empty($validated['parent_id'])) {
            Category::findOrFail($validated['parent_id']);
        }

        return new SingleCategoryResource(Category::create($validated));
    }

    public function update(array $validated, Category $category): SingleCategoryResource
    {
        $category->update($validated);

        $category->fresh();

        return new SingleCategoryResource($category);
    }

    public function delete(Category $category)
    {
        $category->delete();
    }
}
