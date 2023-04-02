<?php

namespace Database\Factories;

use App\Models\ProductType;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpecificationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'product_type_id' => ProductType::factory()
        ];
    }
}
