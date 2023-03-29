<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SpecificationValue\StoreSpecificationValueRequest;
use App\Http\Requests\SpecificationValue\UpdateSpecificationValueRequest;
use App\Http\Resources\SpecificationValueResource;
use App\Models\Product;
use App\Models\Specification;
use App\Models\SpecificationValue;
use Symfony\Component\HttpFoundation\Response;

class SpecificationValueController extends Controller
{
    public function index()
    {
        return SpecificationValueResource::collection(SpecificationValue::all());
    }

    public function store(StoreSpecificationValueRequest $request)
    {
        $validated = $request->validated();

        Specification::findOrFail($validated['specification_id']);
        Product::findOrFail($validated['product_id']);

        return new SpecificationValueResource(SpecificationValue::create($validated));
    }

    public function show(SpecificationValue $specificationValue)
    {
        return new SpecificationValueResource($specificationValue);
    }

    public function update(UpdateSpecificationValueRequest $request, SpecificationValue $specificationValue)
    {
        $validated = $request->validated();

        if(isset($validated['specification_id']))
        {
            Specification::findOrFail($validated['specification_id']);
        }

        if(isset($validated['product_id']))
        {
            Product::findOrFail($validated['product_id']);
        }

        $specificationValue->update($validated);

        return new SpecificationValueResource($specificationValue);
    }

    public function destroy(SpecificationValue $specificationValue)
    {
        $specificationValue->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
