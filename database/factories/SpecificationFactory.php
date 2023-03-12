<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SpecificationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'product_type_id' => $this->faker->numberBetween(1, 10)
        ];
    }
}
