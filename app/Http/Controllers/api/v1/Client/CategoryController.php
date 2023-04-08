<?php

namespace App\Http\Controllers\api\v1\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Category\ShowCategoryRequest;
use App\Services\Client\CategoryService;

class CategoryController extends Controller
{
    public function __construct(private readonly CategoryService $categoryService)
    {
    }

    public function index()
    {
        return $this->categoryService->findAll();
    }

    public function show(int $id, ShowCategoryRequest $request)
    {
        $validated = $request->validated();

        return $this->categoryService->findById($id, $validated);
    }
}
