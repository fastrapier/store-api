<?php

namespace App\Services\impl;

use App\Http\Resources\Configurator\ConfiguratorResource;
use App\Models\Configurator;
use App\Services\ConfiguratorService;

class ConfiguratorServiceImpl implements ConfiguratorService
{

    public function create(array $data): ConfiguratorResource
    {
        $configurator = Configurator::create($data);

        return new ConfiguratorResource($configurator);
    }

    public function findById(int $id): ConfiguratorResource
    {
        $configurator = Configurator::findOrFail($id);
        $configurator->with('configuratorProductType');
        $configurator->configuratorProductType()->with('products');
        return new ConfiguratorResource($configurator);
    }

    public function delete(int $id): void
    {
        $configurator = Configurator::findOrFail($id);

        $configurator->delete();
    }
}
