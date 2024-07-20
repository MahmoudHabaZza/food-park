<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banner_sliders = array(
            array(
                "id" => 1,
                "title" => "Red Chicken",
                "sub_title" => "lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum",
                "url" => "javascript:;",
                "banner" => "uploads/Default/669b38859b86f.jpg",
                "status" => 1,
                "created_at" => "2024-07-19 01:03:04",
                "updated_at" => "2024-07-20 04:09:41",
            ),
            array(
                "id" => 2,
                "title" => "Red Chicken",
                "sub_title" => "lorem ipsum lorem ipsum lorem ipsum",
                "url" => "javascript:;",
                "banner" => "uploads/Default/669b388e1a9e3.jpg",
                "status" => 1,
                "created_at" => "2024-07-19 01:03:26",
                "updated_at" => "2024-07-20 04:09:50",
            ),
            array(
                "id" => 3,
                "title" => "Shripm Zone",
                "sub_title" => "lorem ipsum lorem ipsum lorem ipsum lorem ipsum",
                "url" => "javascript:;",
                "banner" => "uploads/Default/669b3896aec23.jpg",
                "status" => 1,
                "created_at" => "2024-07-19 01:03:48",
                "updated_at" => "2024-07-20 04:09:58",
            ),
        );


        DB::table('banner_sliders')->insert($banner_sliders);

    }
}
