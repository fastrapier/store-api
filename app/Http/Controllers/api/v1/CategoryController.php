<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(Category::with('children')->whereNull('parent_id')->get());
    }

    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();

        if(isset($validated['parent_id']) && !empty($validated['parent_id']))
        {
            Category::findOrFail($validated['parent_id']);
        }

        $created_category = Category::create($validated);

        return new CategoryResource($created_category);
    }

    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return new CategoryResource($category);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
