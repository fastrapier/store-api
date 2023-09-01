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
            $configuration_id = $validated['configuration_id'];

            $selected_product_id = $elem['selected_product_id'];

            $found = false;

            foreach ($product->platform as $plat)
            {
                if($plat->configuration_id == $configuration_id)
                {
                    $found = true;

                    if($selected_product_id !== $plat->selected_product_id)
                    {
                        Platform::where(['configuration_id' => $plat->configuration_id, 'product_id' => $plat->product_id])->update(['selected_product_id' => $selected_product_id]);
                    }

                    break;
                }
            }
            if(!$found)
            {
                Platform::create([
                    'configuration_id' => $elem['configuration_id'],
                    'selected_product_id' => $elem['selected_product_id'],
                    'product_id' => $product->id
                ]);
            }
        }

        $product->load(['productType', 'platform', 'specification_values']);

        $product->refresh();

        return new ProductResource($product);
    }
}
