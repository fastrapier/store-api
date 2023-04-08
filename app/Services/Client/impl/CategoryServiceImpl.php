<?php


namespace App\Services\Client\impl;

use App\Http\Resources\Client\Category\CategoryCollection;
use App\Http\Resources\Client\Category\SingleCategoryResource;
use App\Models\Category;
use App\Models\Product;
use App\Services\Client\CategoryService;

class CategoryServiceImpl implements CategoryService
{
    public function findAll(): CategoryCollection
    {
        return new CategoryCollection(Category::withCount('products')->get());
    }

    public function findById(int $id, array $validated): SingleCategoryResource
    {
        $category = Category::findOrFail($id);

        $perPage = 15;
        $page = 1;

        if (isset($validated['page'])) {
            $page = $validated['page'];
        }
        if (isset($validated['perPage'])) {
            $perPage = $validated['perPage'];
        }


        $products = Product::where('category_id', '=', $id)->paginate(perPage: $perPage, page: $page);
        $category->products = $products;

        return new SingleCategoryResource($category);
    }
}
