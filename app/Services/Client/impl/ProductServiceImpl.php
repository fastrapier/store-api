<?php

namespace App\Services\Client\impl;

use App\Http\Resources\Client\Product\ProductCollection;
use App\Http\Resources\Client\Product\SingleProductResource;
use App\Models\Product;
use App\Services\Client\ProductService;

class ProductServiceImpl implements ProductService
{
    public function findAll(): ProductCollection
    {
        $data = Product::all();

        return new ProductCollection($data);
    }

    public function findById(int $id): SingleProductResource
    {
        $product = Product::where('id', '=', $id)->with('configurator')->with('specifications_values')->firstOrFail();

        return new SingleProductResource($product);
    }
}
