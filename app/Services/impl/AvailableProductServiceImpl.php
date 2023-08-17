<?php

namespace App\Services\impl;

use App\Http\Resources\Product\ProductResource;
use App\Models\AvailableProduct;
use App\Models\Product;
use App\Services\AvailableProductService;
use Carbon\Carbon;

class AvailableProductServiceImpl implements AvailableProductService
{

    public function store(array $validated, Product $product): ProductResource
    {

        foreach ($validated['configurations'] as $configuration) {

            $arr = [];

            foreach ($configuration['available_products_ids'] as $available_product_id) {
                $arr[] = [
                    'configuration_id' => $configuration['configuration_id'],
                    'for_product_id' => $product->id,
                    'available_product_id' => $available_product_id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ];
            }

            AvailableProduct::insert($arr);
        }

        return new ProductResource($product->load(['productType', 'availableProducts']));
    }

    public function update(array $validated, Product $product): ProductResource
    {
        $product->load(['availableProducts']);

        $ids = [];

        foreach ($product->availableProducts as $availableProduct)
        {
            $ids[] = $availableProduct->available_product_id;
        }

        $arr = [];

        foreach ($validated['configuration'] as $configuration) {
            foreach ($configuration['available_products_ids'] as $available_product_id) {
                if (($key = array_search($available_product_id, $ids)) !== false) {
                    unset($ids[$key]);
                }
                else {
                    $arr[] = [
                        'configuration_id' => $configuration['configuration_id'],
                        'for_product_id' => $product->id,
                        'available_product_id' => $available_product_id,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ];
                }

            }
        }

        if(!empty($ids)) {

            $to_remove = [];

            foreach ($product->availableProducts as $availableProduct)
            {
                if(in_array($availableProduct->available_product_id, $ids))
                {
                    $to_remove[] = $availableProduct->id;
                }
            }

            AvailableProduct::whereIn('id', $to_remove)->delete();
        }

        if(!empty($arr)) {
            AvailableProduct::insert($arr);
        }

        $product->refresh();

        return new ProductResource($product->load(['productType', 'availableProducts']));
    }
}
