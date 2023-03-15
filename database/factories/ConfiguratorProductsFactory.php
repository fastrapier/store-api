<?php

namespace Database\Factories;

use App\Models\Configurator_ProductTypes;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConfiguratorProductsFactory extends Factory
{
    public function definition(): array
    {
        return [
            'configurator__product_type_id' => Configurator_ProductTypes::factory(),
            'product_id' => Product::factory()
        ];
    }
}
