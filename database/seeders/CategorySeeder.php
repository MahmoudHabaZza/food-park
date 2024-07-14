<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Category::insert([
            [
                'name' => 'Burger',
                'slug' => Str::slug('burger'),
                'status' => 1,
                'show_at_home' => 1
            ],
            [
                'name' => 'Chicken',
                'slug' => Str::slug('Chicken'),
                'status' => 1,
                'show_at_home' => 1
            ],
            [
                'name' => 'Pizza',
                'slug' => Str::slug('Pizza'),
                'status' => 1,
                'show_at_home' => 1
            ],
            [
                'name' => 'Desserts',
                'slug' => Str::slug('desserts'),
                'status' => 1,
                'show_at_home' => 1
            ],
            [
                'name' => 'Grill',
                'slug' => Str::slug('grill'),
                'status' => 1,
                'show_at_home' => 1
            ],
        ]);
    }
}
