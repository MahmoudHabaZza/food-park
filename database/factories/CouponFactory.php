<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'name' => fake()->word(),
            'code' => fake()->word(),
            'quantity' => fake()->randomElement([20,50,70]),
            'min_purchase_amount' => fake()->randomFloat(4,200,500),
            'expire_date' => fake()->date(),
            'discount_type' => 'percent',
            'discount' => 10,
            'status' => fake()->boolean(),
        ];
    }
}
