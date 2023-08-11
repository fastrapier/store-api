<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\AvailableProduct\StoreAvailableProductsRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\AvailableProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class AvailableProductController extends Controller
{


    public function store(StoreAvailableProductsRequest $request)
    {
        $validated = $request->validated();

        $for_product = Product::findOrFail($validated['for_product_id']);

        foreach ($validated['configurations'] as $configuration)
        {
            $configuration_id = $configuration['configuration_id'];

            foreach ($configuration['available_products_ids'] as $available_products_id)
            {
                AvailableProduct::create([
                    'configuration_id' => $configuration_id,
                    'for_product_id' => $for_product->id,
                    'available_product_id' => $available_products_id
                ]);
            }
        }

        return new ProductResource($for_product->load(['productType', 'availableProducts']));
    }

    public function update(Request $request, AvailableProduct $availableProduct)
    {
        //
    }

}
