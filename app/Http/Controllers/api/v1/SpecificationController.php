<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Specification\StoreSpecificationRequest;
use App\Http\Requests\Specification\UpdateSpecificationRequest;
use App\Models\Specification;
use App\Services\SpecificationService;
use Symfony\Component\HttpFoundation\Response;

class SpecificationController extends Controller
{
    public function __construct(private readonly SpecificationService $specificationService)
    {
        $this->middleware('auth.role:admin');
    }

    public function index()
    {
        return $this->specificationService->findAll();
    }

    public function store(StoreSpecificationRequest $request)
    {
        $validated = $request->validated();

        return $this->specificationService->create($validated);
    }

    public function show(Specification $specification)
    {
        return $this->specificationService->findById($specification);
    }

    public function update(UpdateSpecificationRequest $request, Specification $specification)
    {
        $validated = $request->validated();

        return $this->specificationService->update($validated, $specification);
    }

    public function destroy(Specification $specification)
    {
        $this->specificationService->delete($specification);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
