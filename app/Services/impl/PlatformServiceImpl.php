<?php

namespace App\Services\impl;

use App\Http\Resources\Product\ProductResource;
use App\Models\Platform;
use App\Models\Product;
use App\Services\PlatformService;

class PlatformServiceImpl implements PlatformService
{

    public function store(array $validated, Product $product): ProductResource
    {
        foreach ($validated['platform'] as $elem)
        {
            Platform::create([
                'configuration_id' => $elem['configuration_id'],
                'selected_product_id' => $elem['selected_product_id'],
                'product_id' => $product->id
            ]);
        }

        $product->load(['productType', 'platform', 'specification_values']);

        $product->refresh();

        return new ProductResource($product);
    }
}
