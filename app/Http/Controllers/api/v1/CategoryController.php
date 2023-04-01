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
        return $this->categoryService->findAll();
    }

    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();

        return $this->categoryService->create($validated);
    }

    public function show(Category $category)
    {
        return $this->categoryService->findById($category);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {

        $validated = $request->validated();

        return $this->categoryService->update($validated, $category);
    }

    public function destroy(Category $category)
    {
        $this->categoryService->delete($category);

        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
