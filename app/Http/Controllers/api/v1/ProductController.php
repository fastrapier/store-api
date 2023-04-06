<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;

use App\Services\ProductService;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function __construct(private readonly ProductService $productService)
    {
        $this->middleware('auth.role:admin', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        return $this->productService->findAll();
    }

    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        return $this->productService->create($validated);
    }

    public function show(int $id)
    {
        return $this->productService->findById($id);
    }

    public function update(UpdateProductRequest $request, int $id)
    {
        $validated = $request->validated();

        return $this->productService->update($validated, $id);
    }

    public function destroy(int $id)
    {
        $this->productService->delete($id);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
