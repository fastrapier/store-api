<?php

namespace Database\Factories;

use App\Models\Configuration;
use App\Models\ProductType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ConfigurationFactory extends Factory
{
    protected $model = Configuration::class;

    public function definition(): array
    {
        return [
            'max_count' => $this->faker->randomNumber(),
            'quantity_of_divided_item' => $this->faker->randomNumber(),
            'is_divided' => $this->faker->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'product_type_id' => ProductType::get()->random()->id,
            'configuration_product_type_id' => ProductType::get()->random()->id,
        ];
    }
}
