<?php

namespace App\Http\Controllers\api\v1\Admin;

use App\Http\Controllers\Controller;
use App\Models\ConfiguratorProductType;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConfiguratorProductTypeController extends Controller
{
    public function index()
    {
        return ConfiguratorProductType::all();
    }

    public function store(Request $request)
    {
    }

    public function show(ConfiguratorProductType $configurator_ProductTypes)
    {
        return $configurator_ProductTypes;
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
