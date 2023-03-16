<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ConfiguratorProductResource;
use App\Models\ConfiguratorProduct;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConfiguratorProductController extends Controller
{
    public function index()
    {
        return ConfiguratorProductResource::collection(ConfiguratorProduct::all());
    }

    public function store(Request $request)
    {
    }

    public function show(ConfiguratorProduct $configuratorProducts)
    {
        return new ConfiguratorProductResource($configuratorProducts);
    }

    public function update(Request $request, ConfiguratorProduct $configuratorProducts)
    {
    }

    public function destroy(ConfiguratorProduct $configuratorProducts)
    {
        $configuratorProducts->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
