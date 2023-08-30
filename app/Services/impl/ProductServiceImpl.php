<?php

namespace App\Services\impl;

use App\Http\Resources\Product\ProductResource;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductType;
use App\Services\ProductService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductServiceImpl implements ProductService
{
    public function update(array $validated, Product $product): ProductResource
    {

        $product = $product->load('specification_values');

        if(empty($validated['img']))
        {
            $validated['img'] = $product->img;
        }

        if(!empty($validated['product_type']) && $product->productType->id != $validated['product_type'])
        {
            $product->specification_values()->delete();
        }

        if (!empty($validated['specification_values'])) {

            foreach($validated['specification_values'] as $key => $val)
            {
                $found = false;

                foreach ($product->specification_values as $k => $v)
                {
                    if($val['specification_id'] == $v->specification_id)
                    {
                        $product->specification_values()->where([
                            ['specification_id', "=", $val['specification_id']],
                            ['product_id', "=", $product->id]
                        ])->update(['specification_id' => $val['specification_id'], 'value' => $val['value'], 'product_id' => $product->id]);

                        $found = true;
                    }
                }

                if(!$found)
                {
                    $product->specification_values()->create([
                        'specification_id' => $val['specification_id'],
                        'value' => $val['value'],
                        'product_id' => $product->id
                    ]);
                }
            }
        }

        unset($validated['specification_values']);

        $product->update($validated);

        $product = $product->fresh();

        return new ProductResource($product);
    }


    public function findAll(): AnonymousResourceCollection
    {
        return ProductResource::collection(Product::all());
    }

    public function create(array $validated): ProductResource
    {
        $specification_values = $validated['specification_values'];

        $validated['article'] = rand(100, 10000);

        $product = Product::create($validated);
        if (!empty($validated['specification_values'])) {
            foreach ($specification_values as $id => $specification_value) {
                $specification_values[$id]['product_id'] = $product->id;
            }

            $product->specification_values()->createMany($specification_values);
        }


        $product->load(['specification_values', 'availableProducts']);

        return new ProductResource($product);
    }

    public function delete(Product $product): void
    {

        $product->delete();

    }

    public function deleteByIds(array $ids): void
    {
        Product::whereIn('id', $ids)->delete();
    }

    public function find(Product $product): ProductResource
    {
        if ($product->productType->configurable) {
            $product->load(['availableProducts', 'platform']);
            $product->productType->load(['configurations', 'specifications']);
        }

        return new ProductResource($product);
    }
}
