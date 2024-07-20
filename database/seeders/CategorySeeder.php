<?php

namespace Database\Seeders;

use App\Models\Category;
use DB;
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
        $categories = array(
            array(
                "id" => 1,
                "name" => "Burger",
                "slug" => "burger",
                "status" => 1,
                "show_at_home" => 1,
                "created_at" => "2024-07-19 00:24:10",
                "updated_at" => "2024-07-19 00:24:10",
            ),
            array(
                "id" => 2,
                "name" => "Chicken",
                "slug" => "chicken",
                "status" => 1,
                "show_at_home" => 1,
                "created_at" => "2024-07-19 00:24:26",
                "updated_at" => "2024-07-19 00:24:26",
            ),
            array(
                "id" => 3,
                "name" => "Desserts",
                "slug" => "desserts",
                "status" => 1,
                "show_at_home" => 1,
                "created_at" => "2024-07-19 00:24:35",
                "updated_at" => "2024-07-19 00:24:35",
            ),
            array(
                "id" => 4,
                "name" => "Pizza",
                "slug" => "pizza",
                "status" => 1,
                "show_at_home" => 1,
                "created_at" => "2024-07-19 00:25:51",
                "updated_at" => "2024-07-19 00:25:51",
            ),
            array(
                "id" => 5,
                "name" => "Sea Food",
                "slug" => "sea-food",
                "status" => 1,
                "show_at_home" => 1,
                "created_at" => "2024-07-19 00:27:14",
                "updated_at" => "2024-07-19 00:27:14",
            ),
        );

        DB::table('categories')->insert($categories);
    }
}
