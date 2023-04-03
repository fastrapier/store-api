<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductType\StoreProductTypeRequest;
use App\Http\Requests\ProductType\UpdateProductTypeRequest;
use App\Services\ProductTypeService;
use Symfony\Component\HttpFoundation\Response;

class ProductTypeController extends Controller
{
    public function __construct(private readonly ProductTypeService $productTypeService)
    {
        $this->middleware('auth.role:admin', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        return $this->productTypeService->findAll();
    }

    public function store(StoreProductTypeRequest $request)
    {
        $validated = $request->validated();

        return $this->productTypeService->create($validated);
    }

    public function show(int $id)
    {
        return $this->productTypeService->findById($id);
    }

    public function update(UpdateProductTypeRequest $request, int $id)
    {
        $validated = $request->validated();

        return $this->productTypeService->update($validated, $id);
    }

    public function destroy(int $id)
    {
        $this->productTypeService->delete($id);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
