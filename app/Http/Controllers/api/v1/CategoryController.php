<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Services\CategoryService;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{

    public function __construct(private readonly CategoryService $categoryService)
    {
        $this->middleware('auth.role:admin', ['except' => ['index', 'show']]);
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

    public function show(int $id)
    {
        return $this->categoryService->findById($id);
    }

    public function update(UpdateCategoryRequest $request, int $id)
    {
        $validated = $request->validated();

        return $this->categoryService->update($validated, $id);
    }

    public function destroy(int $id)
    {
        $this->categoryService->delete($id);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
