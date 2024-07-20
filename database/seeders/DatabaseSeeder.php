<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            SliderSeeder::class,
            BannerSliderSeeder::class,
            ChefSeeder::class,
            CategorySeeder::class,
            CounterSeeder::class,
            FooterInfoSeeder::class,
            SocialLinkSeeder::class,
            TestimonialSeeder::class,
            CustomPageSeeder::class

        ]);
    }
}
