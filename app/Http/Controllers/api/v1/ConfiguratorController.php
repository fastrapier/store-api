<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequests\StoreConfiguratorRequest;
use App\Http\Requests\UpdateRequests\UpdateConfiguratorRequest;
use App\Models\Configurator;

class ConfiguratorController extends Controller
{

    public function index()
    {
        return Configurator::with('configuratorProductType')->get();
    }


    public function store(StoreConfiguratorRequest $request)
    {
        //
    }

    public function show(Configurator $configurator)
    {
        //
    }

    public function update(UpdateConfiguratorRequest $request, Configurator $configurator)
    {
        //
    }

    public function destroy(Configurator $configurator)
    {
        //
    }
}
