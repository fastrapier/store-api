<?php

namespace Database\Factories;

use App\Models\Configurator;
use App\Models\ProductType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConfiguratorProductTypeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'configurator_id' => Configurator::factory(),
            'product_type_id' => ProductType::factory()
        ];
    }
}
