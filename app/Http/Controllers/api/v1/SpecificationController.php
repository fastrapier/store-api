<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequests\StoreSpecificationRequest;
use App\Http\Requests\UpdateRequests\UpdateSpecificationRequest;
use App\Http\Resources\SpecificationResource;
use App\Models\ProductType;
use App\Models\Specification;
use Symfony\Component\HttpFoundation\Response;

class SpecificationController extends Controller
{
    public function index()
    {
        return SpecificationResource::collection(Specification::all());
    }

    public function store(StoreSpecificationRequest $request)
    {
        $validated = $request->validated();

        if(isset($validated['product_type_id']))
        {
            ProductType::findOrFail($validated['product_type_id']);
        }

        return new SpecificationResource(Specification::create($request->validated()));
    }

    public function show(Specification $specification)
    {
        return new SpecificationResource($specification);
    }

    public function update(UpdateSpecificationRequest $request, Specification $specification)
    {
        $validated = $request->validated();

        if(isset($validated['product_type_id']))
        {
            ProductType::findOrFail($validated['product_type_id']);
        }

        $specification->update($validated);

        return new SpecificationResource($specification);
    }

    public function destroy(Specification $specifications)
    {
        $specifications->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
