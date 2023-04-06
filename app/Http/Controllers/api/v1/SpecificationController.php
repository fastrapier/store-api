<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Specification\StoreSpecificationRequest;
use App\Http\Requests\Specification\UpdateSpecificationRequest;
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

    public function show(int $id)
    {
        return $this->specificationService->findById($id);
    }

    public function update(UpdateSpecificationRequest $request, int $id)
    {
        $validated = $request->validated();

        return $this->specificationService->update($validated, $id);
    }

    public function destroy(int $id)
    {
        $this->specificationService->delete($id);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
