<?php

namespace App\Http\Controllers\api\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SpecificationValue\StoreSpecificationValueRequest;
use App\Http\Requests\Admin\SpecificationValue\UpdateSpecificationValueRequest;
use App\Models\Product;
use App\Models\Specification;
use App\Models\SpecificationValue;
use Symfony\Component\HttpFoundation\Response;

class SpecificationValueController extends Controller
{

    public function index()
    {
        return SpecificationValue::all();
    }

    public function store(StoreSpecificationValueRequest $request)
    {
        $validated = $request->validated();

        Specification::findOrFail($validated['specification_id']);
        Product::findOrFail($validated['product_id']);

        return SpecificationValue::create($validated);
    }

    public function show(SpecificationValue $specificationValue)
    {
        return $specificationValue;
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

        return $specificationValue;
    }

    public function destroy(SpecificationValue $specificationValue)
    {
        $specificationValue->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
