<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductType\StoreProductTypeRequest;
use App\Http\Requests\ProductType\UpdateProductTypeRequest;
use App\Http\Resources\Product\ProductTypeResource;
use App\Models\ProductType;
use Symfony\Component\HttpFoundation\Response;

class ProductTypeController extends Controller
{
    public function index()
    {
        return ProductTypeResource::collection(ProductType::all());
    }

    public function store(StoreProductTypeRequest $request)
    {
        $created_product_type = ProductType::create($request->validated());

        return new ProductTypeResource($created_product_type);
    }

    public function show(ProductType $productType)
    {
        return new ProductTypeResource($productType);
    }

    public function update(UpdateProductTypeRequest $request, ProductType $productType)
    {
        $productType->update($request->validated());

        return new ProductTypeResource($productType);
    }

    public function destroy(ProductType $productType)
    {
        $productType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
