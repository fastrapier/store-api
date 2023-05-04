<?php

namespace App\Services\impl;

use App\Http\Resources\Configurator\ConfiguratorProductTypeResource;
use App\Models\ConfiguratorProduct;
use App\Services\ConfiguratorProductService;

class ConfiguratorProductServiceImpl implements ConfiguratorProductService
{

    public function create(array $data): ConfiguratorProductTypeResource
    {
        $configurator_product = ConfiguratorProduct::create($data);

        return new ConfiguratorProductTypeResource($configurator_product->configurator_product_type);
    }

    public function delete(int $id): void
    {
        $product = ConfiguratorProduct::findOrFail($id);

        $product->delete();
    }
}
