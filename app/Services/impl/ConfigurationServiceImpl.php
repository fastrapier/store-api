<?php

namespace App\Services\impl;

use App\Http\Resources\ProductType\ProductTypeResource;
use App\Models\Configuration;
use App\Models\ProductType;
use App\Services\ConfigurationService;

class ConfigurationServiceImpl implements ConfigurationService
{

    public function store(array $validated, ProductType $productType): ProductTypeResource
    {

        $configuration = Configuration::create(
            [
                'product_type_id' => $productType->id,
                'configuration_product_type_id' => $validated['configuration_product_type_id']
            ]
        );

        return new ProductTypeResource($configuration->productType->load(['specifications', 'configurations']));
    }

    public function destroy(Configuration $configuration): void
    {
        $configuration->delete();
    }

    public function update(array $validated, ProductType $productType, Configuration $configuration): ProductTypeResource
    {
        $configuration->update($validated);

        return new ProductTypeResource($productType->load(['specifications', 'configurations']));
    }
}
