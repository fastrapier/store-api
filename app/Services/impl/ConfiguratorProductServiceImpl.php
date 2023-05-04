<?php

namespace App\Services\impl;

use App\Http\Resources\Configurator\ConfiguratorProductResource;
use App\Models\Configurator;
use App\Models\ConfiguratorProduct;
use App\Services\ConfiguratorProductService;

class ConfiguratorProductServiceImpl implements ConfiguratorProductService
{

    public function create(array $data): ConfiguratorProductResource
    {
        $configurator_product = ConfiguratorProduct::create($data);

        return new ConfiguratorProductResource($configurator_product);
    }

    public function delete($validated): void
    {

        $product = ConfiguratorProduct::where(
            [
                ['configurator_product_type_id', "=", $validated['configurator_product_type_id']],
                ['product_id', "=", $validated['product_id']]
            ]);
        $product->delete();
    }
}
