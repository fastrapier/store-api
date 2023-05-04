<?php

namespace App\Services\impl;

use App\Http\Resources\Product\ProductResource;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\SpecificationValue;
use App\Services\ProductService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductServiceImpl implements ProductService
{
    public function update(array $validated, int $id): ProductResource
    {
        if (isset($validated['category_id'])) {
            Category::findOrFail($validated['category_id']);
        }
        if (isset($validated['product_type_id'])) {
            ProductType::findOrFail($validated['product_type_id']);
        }

        $product = Product::with('specification_values')->findOrFail($id);

        if (!empty($validated['specification_values'])) {
            $specification_values = $validated['specification_values'];

            foreach ($specification_values as $valId => $valueFromRequest)
            {
                if(!empty($valueFromRequest['id']))
                {
                    foreach ($product->specification_values as $specifications_value)
                    {
                        if($specifications_value->id != $valueFromRequest['id'])
                        {
                            continue;
                        }

                        if($specifications_value->value != $valueFromRequest['value'])
                        {
                            $specifications_value->update(['value' => $valueFromRequest['value']]);
                        }
                        break;
                    }
                }
                else
                {
                    SpecificationValue::create([
                        'specification_id' => $valueFromRequest['specification_id'],
                        'product_id' => $product->id,
                        'value' => $valueFromRequest['value']
                    ]);
                }
            }
        }
        unset($validated['specification_values']);

        $product->update($validated);

        $product = Product::with('specification_values')->with('configurator')->findOrFail($id);

        return new ProductResource($product);
    }


    public function findAll(): AnonymousResourceCollection
    {
        $product = Product::with('configurator')->get();

        return ProductResource::collection($product);
    }

    public function findById(int $id): ProductResource
    {
        $product = Product::where('id', '=', $id)->with('configurator')->with('specification_values')->firstOrFail();

        return new ProductResource($product);
    }

    public function create(array $validated): ProductResource
    {
        Category::findOrFail($validated['category_id']);

        ProductType::findOrFail($validated['product_type_id']);

        $specification_values = $validated['specification_values'];

        $product = Product::create($validated);

        foreach ($specification_values as $id => $specification_value) {
            $specification_values[$id]['product_id'] = $product->id;
        }

        $product->specification_values()->createMany($specification_values);

        $product = $product->with('specification_values')->with('configurator')->findOrFail($product->id);

        return new ProductResource($product);
    }

    public function delete(int $id): void
    {
        $product = Product::findOrFail($id);

        $product->delete();

    }

    public function deleteByIds(array $ids): void
    {
        Product::whereIn('id', $ids)->delete();
    }
}
