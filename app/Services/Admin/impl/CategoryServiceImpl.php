<?php


namespace App\Services\Admin\impl;

use App\Http\Resources\Admin\Category\CategoryCollection;
use App\Http\Resources\Admin\Category\SingleCategoryResource;
use App\Models\Category;
use App\Services\Admin\CategoryService;

class CategoryServiceImpl implements CategoryService
{
    public function findAll(): CategoryCollection
    {
        return new CategoryCollection(Category::all());
    }

    public function findById(int $id): SingleCategoryResource
    {
        return new SingleCategoryResource(Category::findOrFail($id));
    }

    public function create(array $validated): SingleCategoryResource
    {
        if (!empty($validated['parent_id'])) {
            Category::findOrFail($validated['parent_id']);
        }
        return new SingleCategoryResource(Category::create($validated));
    }

    public function update(array $validated, int $id): SingleCategoryResource
    {
        $category = Category::findOrFail($id);

        $category->update($validated);

        $category->fresh();

        return new SingleCategoryResource($category);
    }

    public function delete(int $id): void
    {
        $category = Category::findOrFail($id);

        $category->delete();
    }
}
