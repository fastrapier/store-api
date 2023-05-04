<?php

namespace App\Services\impl;

use App\Http\Resources\Configurator\ConfiguratorProductResource;
use App\Http\Resources\Configurator\ConfiguratorProductTypeResource;
use App\Models\ConfiguratorProduct;
use App\Services\ConfiguratorProductService;

class ConfiguratorProductServiceImpl implements ConfiguratorProductService
{

    public function create(array $data): ConfiguratorProductResource
    {
        $configurator_product = ConfiguratorProduct::create($data);

        return new ConfiguratorProductResource($configurator_product);
    }

    public function delete(int $id): void
    {
        $product = ConfiguratorProduct::findOrFail($id);

        $product->delete();
    }
}
