<?php


namespace App\Services\impl;

use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoryServiceImpl implements CategoryService
{
    public function findAll(): AnonymousResourceCollection
    {
        return CategoryResource::collection(Category::withCount('products')->get());
    }

    public function findById(int $id): CategoryResource
    {
        $category = Category::with('products')->findOrFail($id);
        return new CategoryResource($category);
    }

    public function create(array $validated): CategoryResource
    {
        if (!empty($validated['parent_id'])) {
            Category::findOrFail($validated['parent_id']);
        }
        return new CategoryResource(Category::create($validated));
    }

    public function update(array $validated, int $id): CategoryResource
    {
        $category = Category::findOrFail($id);

        $category->update($validated);

        $category->fresh();

        return new CategoryResource($category);
    }

    public function delete(int $id): void
    {
        $category = Category::findOrFail($id);

        $category->delete();
    }
}
