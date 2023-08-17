<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\AvailableProduct\AvailableProductsRequest;
use App\Models\Product;
use App\Services\AvailableProductService;

class AvailableProductController extends Controller
{
    public function __construct(private readonly AvailableProductService $availableProductService)
    {
        $this->middleware('auth.role:admin');
    }
    public function store(AvailableProductsRequest $request, Product $product)
    {
        $validated = $request->validated();

        return $this->availableProductService->store($validated, $product);
    }

    public function update(AvailableProductsRequest $request, Product $product)
    {
        $validated = $request->validated();

        return $this->availableProductService->update($validated, $product);
    }

}
