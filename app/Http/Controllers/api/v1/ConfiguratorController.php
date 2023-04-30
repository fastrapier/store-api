<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Configurator\StoreConfiguratorRequest;
use App\Models\Configurator;
use App\Services\ConfiguratorService;
use Illuminate\Http\Request;

class ConfiguratorController extends Controller
{

    public function __construct(private readonly ConfiguratorService $configuratorService)
    {
        $this->middleware('auth.role:admin', ['except' => ['index', 'update']]);
    }


    public function store(StoreConfiguratorRequest $request)
    {
        $validated = $request->validated();

        return $this->configuratorService->create($validated);
    }

    public function show(int $id)
    {
        return $this->configuratorService->findById($id);
    }

    public function destroy(int $id)
    {
        $this->configuratorService->delete($id);

        return response()->json(null, 204);
    }
}
