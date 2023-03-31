<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CategoryController extends Controller
{

    public function __construct(private CategoryService $categoryService)
    {

    }

    public function index()
    {
        $data = $this->categoryService->findAll();

        return $data;
    }

    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();

        $category = $this->categoryService->create($validated);

        return $category;
    }

    public function show(Category $category)
    {
        $category = $this->categoryService->findById($category);

        return $category;
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {

        $validated = $request->validated();

        $category = $this->categoryService->update($validated, $category);

        return $category;
    }

    public function destroy(Category $category)
    {
        $this->categoryService->delete($category);

        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
