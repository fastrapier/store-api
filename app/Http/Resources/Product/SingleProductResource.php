<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Configurator\ConfiguratorResource;
use App\Http\Resources\SpecificationValue\ProductSpecificationValueResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Product */
class SingleProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'success' => true,
            'data' => [
                'id' => $this->id,
                'title' => $this->title,
                'article' => $this->article,
                'retail_price' => $this->retail_price,
                'configurator_price' => $this->configurator_price,
                'in_stock' => $this->in_stock,
                'description' => $this->description,
                'img' => $this->img,
                'created_at' => $this->created_at,

                'configurator' => new ConfiguratorResource($this->whenLoaded('configurator')),
                'specifications_values' => ProductSpecificationValueResource::collection($this->whenLoaded('specifications_values')),
            ]];
    }
}