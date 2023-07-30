<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductType\DeleteProductTypeRequest;
use App\Http\Requests\ProductType\StoreProductTypeRequest;
use App\Http\Requests\ProductType\UpdateProductTypeRequest;
use App\Models\ProductType;
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

    public function show(ProductType $productType)
    {
        return $this->productTypeService->findById($productType);
    }

    public function update(UpdateProductTypeRequest $request, ProductType $productType)
    {
        $validated = $request->validated();

        return $this->productTypeService->update($validated, $productType);
    }

    public function destroy(ProductType $productType)
    {
        $this->productTypeService->delete($productType);

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function destroyByIds(DeleteProductTypeRequest $request)
    {
        $validated = $request->validated();

        $this->productTypeService->deleteByIds($validated['ids']);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
