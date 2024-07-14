<?php

namespace Database\Factories;

use App\Models\Category;
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
            //
            'name' => fake()->word(),
            'slug' => fake()->slug(),
            'thumb_image' => asset('assets/EndUser/images/brand_1.png'),
            // 'category_id' => Category::get()->random()->id,
            'category_id' => fn() => Category::inRandomOrder()->first()->id ,
            'short_description' => fake()->paragraph(),
            'long_description' => fake()->paragraph(),
            'sku' => fake()->unique()->ean13(),
            'seo_title' => fake()->sentence(),
            'seo_description' => fake()->paragraph(),
            'price' => fake()->randomFloat(3, 20, 300),
            'offer_price' => fake()->randomFloat(3, 20, 200),
            'status' => fake()->boolean(),
            'show_at_home' => fake()->boolean(),

        ];
    }
}
