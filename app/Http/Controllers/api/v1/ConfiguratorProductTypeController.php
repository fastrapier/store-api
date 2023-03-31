<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Configurator\ConfiguratorProductTypeResource;
use App\Models\ConfiguratorProductType;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConfiguratorProductTypeController extends Controller
{
    public function index()
    {
        return ConfiguratorProductTypeResource::collection(ConfiguratorProductType::all());
    }

    public function store(Request $request)
    {
    }

    public function show(ConfiguratorProductType $configurator_ProductTypes)
    {
        return new ConfiguratorProductTypeResource($configurator_ProductTypes);
    }

    public function update(Request $request, ConfiguratorProductType $configurator_ProductTypes)
    {
    }

    public function destroy(ConfiguratorProductType $configurator_ProductTypes)
    {
        $configurator_ProductTypes->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
