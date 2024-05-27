<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ImageProduct>
 */
class ImageProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => fake()->randomElement([
                '1716384080_1531629_PNG-Web-72dpi.jpg', 
                '1716384080_1531630_PNG-Web-72dpi.jpg', 
                '1716384080_1531631_PNG-Web-72dpi.jpg', 
                '1716384080_1531632_PNG-Web-72dpi.jpg',
                '1234d001.jpg',
                '1234d002.jpg',
                '1234d003.jpg',
                '1234d004.jpg',
                '1234d005.jpg',
                '1234d006.jpg',
                '1234d007.jpg',
            ]),
            'created_at' => fake()->dateTime(),
            'updated_at' => fake()->dateTime()
        ];
    }
}
