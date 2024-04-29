<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
                'slug' => 'Burger',
                'status' => 1,
                'show_at_home' => 1
            ],
            [
                'name' => 'Chieck',
                'slug' => 'Chicken',
                'status' => 1,
                'show_at_home' => 1
            ],
            [
                'name' => 'Pizza',
                'slug' => 'Pizza',
                'status' => 1,
                'show_at_home' => 1
            ],
        ]);
    }
}
