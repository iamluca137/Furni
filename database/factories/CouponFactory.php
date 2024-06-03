<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $codeCoupon = Str::random(10);

        // Kiểm tra nếu chuỗi không phù hợp với regex, thì tạo lại chuỗi mới
        while (!preg_match('/^[A-Z0-9]{10}$/', $codeCoupon)) {
            $codeCoupon = Str::random(10);
        }


        return [
            'code' => $codeCoupon,
            'discount' => fake()->numberBetween(1, 100),
            'quantity' => fake()->numberBetween(1, 100),
            // valid_from is earlier than now
            'valid_from' => fake()->dateTimeBetween('-1 year', 'now'),
            // valid_to is later than valid_from
            'valid_until' => fake()->dateTimeBetween('now', '+1 year'),
        ];
    }
}
