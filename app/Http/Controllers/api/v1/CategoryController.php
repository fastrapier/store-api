<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\DeleteCategoryRequest;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Services\CategoryService;
use Illuminate\Support\Facades\Storage;
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

        if ($request->hasFile('img')) {
            $validated['img'] = $request->file('img')->store('public/images/categories');
            $validated['img'] = Storage::url($validated['img']);
        }
        else
        {
            $validated['img'] = 'public/images/no_image.jpg';
        }

        return $this->categoryService->create($validated);
    }

    public function show(int $id)
    {
        return $this->categoryService->findById($id);
    }

    public function update(UpdateCategoryRequest $request, int $id)
    {
        $validated = $request->validated();

        if ($request->hasFile('img')) {
            $validated['img'] = $request->file('img')->store('images/categories');
        }

        return $this->categoryService->update($validated, $id);
    }

    public function destroy(int $id)
    {
        $this->categoryService->delete($id);

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function destroyByIds(DeleteCategoryRequest $request)
    {
        $validated = $request->validated();

        $this->categoryService->deleteByIds($validated['ids']);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
