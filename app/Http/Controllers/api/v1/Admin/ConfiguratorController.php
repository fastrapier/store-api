<?php

namespace App\Http\Controllers\api\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Configurator\StoreConfiguratorRequest;
use App\Http\Requests\Admin\Configurator\UpdateConfiguratorRequest;
use App\Models\Configurator;
use Symfony\Component\HttpFoundation\Response;

class ConfiguratorController extends Controller
{

    public function index()
    {
        return Configurator::all();
    }


    public function store(StoreConfiguratorRequest $request)
    {
        //
    }

    public function show(Configurator $configurator)
    {
        return $configurator;
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
