<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Configurator\StoreConfiguratorRequest;
use App\Http\Requests\Configurator\UpdateConfiguratorRequest;
use App\Http\Resources\Configurator\ConfiguratorResource;
use App\Models\Configurator;
use Symfony\Component\HttpFoundation\Response;

class ConfiguratorController extends Controller
{

    public function index()
    {
        return ConfiguratorResource::collection(Configurator::all());
    }


    public function store(StoreConfiguratorRequest $request)
    {
        //
    }

    public function show(Configurator $configurator)
    {
        return new ConfiguratorResource($configurator);
    }

    public function update(UpdateConfiguratorRequest $request, Configurator $configurator)
    {
        //
    }

    public function destroy(Configurator $configurator)
    {
        $configurator->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
