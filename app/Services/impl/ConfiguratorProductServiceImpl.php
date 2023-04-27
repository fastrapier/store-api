<?php

namespace App\Services\impl;

use App\Http\Resources\Configurator\ConfiguratorProductTypeResource;
use App\Models\ConfiguratorProduct;
use App\Models\ConfiguratorProductType;
use App\Services\ConfiguratorProductService;

class ConfiguratorProductServiceImpl implements ConfiguratorProductService
{

    public function create(array $data): ConfiguratorProductTypeResource
    {
        $configuratorProductType = ConfiguratorProductType::findOrFail($data['configurator_product_type_id']);

        $arr = [];

        foreach ($data['product_ids'] as $id)
        {
            $arr[] = ['product_id' => $id, 'configurator_product_type_id' => $configuratorProductType->id];
        }

        $configuratorProductType->products()->createMany($arr);

        $configuratorProductType->with('products');

        return new ConfiguratorProductTypeResource($configuratorProductType);
    }

    public function delete(int $id): void
    {
        $product = ConfiguratorProduct::findOrFail($id);

        $product->delete();
    }
}
