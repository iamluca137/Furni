<?php

namespace Database\Factories;

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
            'name' => fake()->name(),
            'slug' => fake()->slug(),
            'price' => fake()->numberBetween(10, 10000),
            'description' => fake()->text(),
            'quantity' => fake()->numberBetween(1, 100),
            'category_product_id' => fake()->numberBetween(1, 25),
            'product_status_id' => fake()->numberBetween(1, 3),
            'created_at' => fake()->dateTime(),
            'updated_at' => fake()->dateTime(),
            'deleted_at' => NULL,
        ];
    }
}
