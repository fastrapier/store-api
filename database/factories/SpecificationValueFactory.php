<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Specification;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpecificationValueFactory extends Factory
{
    public function definition(): array
    {
        return [
            'value' => $this->faker->word,
            'specification_id' => Specification::factory(),
            'product_id' => Product::factory()
        ];
    }
}
