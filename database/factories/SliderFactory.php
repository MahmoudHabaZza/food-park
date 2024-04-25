<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'image' => 'avatar.png',
            'offer' => fake()->randomElement(['50%','35%','80%']),
            'title' => fake()->sentence(6),
            'sub_title' => fake()->sentence(8),
            'description' => fake()->paragraph(),
            'btn_link' => fake()->url(),
            'status' => '1'
        ];
    }
}
