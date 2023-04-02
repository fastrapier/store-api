<?php

namespace Database\Factories;

use App\Models\ConfiguratorProductType;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConfiguratorProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'configurator_product_type_id' => ConfiguratorProductType::factory(),
            'product_id' => Product::factory()
        ];
    }
}
