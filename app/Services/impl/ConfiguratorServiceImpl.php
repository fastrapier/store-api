<?php

namespace App\Services\impl;

use App\Models\Configurator;
use App\Models\ConfiguratorProduct;
use App\Models\ConfiguratorProductType;
use App\Services\ConfiguratorService;

class ConfiguratorServiceImpl implements ConfiguratorService
{

    public function create(array $data, int $product_id_to_configurator): void
    {
        $configurator = Configurator::create(['product_id' => $product_id_to_configurator]);

        foreach ($data as $product_type_id => $product_ids)
        {
            $configurator_product_type = ConfiguratorProductType::create(
                [
                    'configurator_id' => $configurator->id,
                    'product_type_id' => $product_type_id
                ]
            );

            foreach ($product_ids as $product_id)
            {
                ConfiguratorProduct::create([
                    'configurator_product_type_id' => $configurator_product_type->id,
                    'product_id' => $product_id
                ]);
            }
        }
    }

    // TODO: Implement configurator update service

    public function update(array $data, int $product_id_to_configurator): void
    {
        $configurator = Configurator::where('product_id', '=', $product_id_to_configurator);

        abort(400, 'Unimplemented');
    }
}
