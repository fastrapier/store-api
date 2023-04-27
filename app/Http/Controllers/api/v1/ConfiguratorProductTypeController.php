<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConfiguratorProductType\ConfiguratorProductTypeRequest;
use App\Services\ConfiguratorProductTypeService;

class ConfiguratorProductTypeController extends Controller
{
    public function __construct(private readonly ConfiguratorProductTypeService $configuratorProductTypeService)
    {
        $this->middleware('auth.role:admin');
    }


    public function store(ConfiguratorProductTypeRequest $request)
    {
        $validated = $request->validated();

        return $this->configuratorProductTypeService->create($validated);
    }

    public function show(int $id)
    {
        return $this->configuratorProductTypeService->findById($id);
    }

    public function destroy(int $id)
    {
        return $this->configuratorProductTypeService->delete($id);
    }
}
