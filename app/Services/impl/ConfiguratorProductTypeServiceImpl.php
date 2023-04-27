<?php

namespace App\Services\impl;

use App\Http\Resources\Configurator\ConfiguratorProductTypeResource;
use App\Models\ConfiguratorProductType;
use App\Services\ConfiguratorProductTypeService;

class ConfiguratorProductTypeServiceImpl implements ConfiguratorProductTypeService
{

    public function create(array $data): ConfiguratorProductTypeResource
    {
        $confProdType = ConfiguratorProductType::create($data);

        return new ConfiguratorProductTypeResource($confProdType);
    }

    public function findById(int $id): ConfiguratorProductTypeResource
    {
        $confProdType = ConfiguratorProductType::with('products')->findOrFail($id);

        return new ConfiguratorProductTypeResource($confProdType);
    }

    public function delete(int $id): void
    {
        $confProdType = ConfiguratorProductType::findOrFail($id);

        $confProdType->delete();
    }
}
