<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SpecificationValueFactory extends Factory
{
    public function definition(): array
    {
        return [
            'value' => $this->faker->word,
            'specification_id' => $this->faker->numberBetween(1,30),
            'product_id' => $this->faker->numberBetween(1,20)
        ];
    }
}
