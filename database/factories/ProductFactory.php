<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Configurator;
use App\Models\ProductType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->text,
            'article' => $this->faker->unique()->iban,
            'retail_price' => $this->faker->randomFloat(2, 0, 10),
            'configurator_price' => $this->faker->randomFloat(2, 0, 10),
            'in_stock' => $this->faker->boolean,
            'description' => $this->faker->text,
            'category_id' => Category::get()->random()->id,
            'product_type_id' => ProductType::get()->random()->id,
        ];
    }
}
