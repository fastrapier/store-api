<?php

namespace App\Http\Controllers\api\v1\Admin;

use App\Http\Controllers\Controller;
use App\Models\ConfiguratorProduct;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConfiguratorProductController extends Controller
{
    public function index()
    {
        return ConfiguratorProduct::all();
    }

    public function store(Request $request)
    {
    }

    public function show(ConfiguratorProduct $configuratorProducts)
    {
        return $configuratorProducts;
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
