<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\SpecificationValue\ProductSpecificationValueResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Product */
class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'article' => $this->article,
            'retail_price' => $this->retail_price,
            'configurator_price' => $this->configurator_price,
            'in_stock' => $this->in_stock,
            'description' => $this->description,
            'img' => $this->img,
            'created_at' => $this->created_at,
            'product_type' => new ConfigurableProductTypeResource($this->productType),
            'use_in_configurator' => $this->use_in_configurator,
            'category_id' => $this->category_id,
            'specification_values' => ProductSpecificationValueResource::collection($this->specification_values),
            'available_products' => $this->whenLoaded('availableProducts', function () {
                $arr = [];

                foreach ($this->availableProducts as $availableProduct) {
//                    $arr[$availableProduct->configuration_id][] = [
//                        'available_product_id' => $availableProduct->available_product_id,
//                        'title' => $availableProduct->availableProduct->title,
//                        'price' => $availableProduct->availableProduct->configurator_price
//                    ];
                    $arr[$availableProduct->configuration_id][] = $availableProduct->available_product_id;
                }

                $resp = [];

                foreach ($arr as $k => $v) {
                    $resp[] = [
                        'configuration_id' => $k,
                        'available_products' => $v
                    ];
                }

                return $resp;
            }),
            'platform' => $this->whenLoaded('platform', function () {
                return $this->platform;
            })
        ];
    }
}
