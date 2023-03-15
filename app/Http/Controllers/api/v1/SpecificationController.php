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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SpecificationResource::collection(Specification::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSpecificationRequest $request)
    {
        $validated = $request->validated();

        if(isset($validated['product_type_id']))
        {
            ProductType::findOrFail($validated['product_type_id']);
        }

        return new SpecificationResource(Specification::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Specification $specification)
    {
        return new SpecificationResource($specification);
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specification $specifications)
    {
        $specifications->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
