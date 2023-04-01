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

    public function findById(int $id): SingleCategoryResource
    {
        $category = Category::findOrFail($id)->withCount('products');

        return new SingleCategoryResource($category);
    }

    public function create(array $validated): SingleCategoryResource
    {

        if (isset($validated['parent_id']) && !empty($validated['parent_id'])) {
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

    public function delete(int $id)
    {
        $category = Category::findOrFail($id);

        $category->delete();
    }
}
