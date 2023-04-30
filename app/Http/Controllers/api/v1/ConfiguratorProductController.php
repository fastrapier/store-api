<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConfiguratorProduct\StoreConfiguratorProductRequest;
use App\Models\ConfiguratorProduct;
use App\Services\ConfiguratorProductService;

class ConfiguratorProductController extends Controller
{
    public function __construct(private readonly ConfiguratorProductService $configuratorProductService)
    {
        $this->middleware('auth.role:admin', ['except' => ['index', 'update']]);
    }

    public function store(StoreConfiguratorProductRequest $request)
    {
        $validated = $request->validated();

        return $this->configuratorProductService->create($validated);
    }

    public function destroy(int $id)
    {
        $this->configuratorProductService->delete($id);

        return response()->json(null, 204);
    }
}
