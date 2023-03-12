<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductTypeRequest;
use App\Http\Requests\UpdateProductTypeRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductTypeResource;
use App\Models\ProductType;
use Symfony\Component\HttpFoundation\Response;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProductTypeResource::collection(ProductType::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductTypeRequest $request)
    {
        $created_product_type = ProductType::create($request->validated());

        return new ProductTypeResource($created_product_type);
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductType $productType)
    {
        return new ProductTypeResource($productType);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductTypeRequest $request, ProductType $productType)
    {
        $productType->update($request->validated());

        return new ProductTypeResource($productType);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductType $productType)
    {
        $productType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
