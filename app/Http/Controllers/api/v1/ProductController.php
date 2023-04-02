<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;

use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use App\Services\ProductService;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function __construct(private readonly ProductService $productService)
    {
    }

    public function index()
    {
        return ProductResource::collection(Product::all());
    }

    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        return $this->productService->store($validated);
    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validated();

        return $this->productService->update($validated, $product);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
