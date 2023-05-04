<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConfiguratorProduct\DeleteConfiguratorProductRequest;
use App\Http\Requests\ConfiguratorProduct\StoreConfiguratorProductRequest;
use App\Services\ConfiguratorProductService;

class ConfiguratorProductController extends Controller
{
    public function __construct(private readonly ConfiguratorProductService $configuratorProductService)
    {
        $this->middleware('auth.role:admin');
    }

    public function store(StoreConfiguratorProductRequest $request)
    {
        $validated = $request->validated();

        return $this->configuratorProductService->create($validated);
    }

    public function destroy(DeleteConfiguratorProductRequest $request)
    {
        $validated = $request->validated();

        $this->configuratorProductService->delete($validated);

        return response()->json(null, 204);
    }
}
