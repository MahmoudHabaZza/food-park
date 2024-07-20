<?php

namespace Database\Seeders;

use App\Models\Slider;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sliders = array(
            array(
                "id" => 1,
                "image" => "uploads/Default/669b386f1d3e8.png",
                "offer" => "35",
                "title" => "Different spice for a Different taste",
                "sub_title" => "Fast Food & Restaurants",
                "description" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum fugit minima et debitis ut distinctio optio qui voluptate natus.",
                "btn_link" => "javascript:;",
                "status" => 1,
                "created_at" => "2024-07-19 00:46:53",
                "updated_at" => "2024-07-20 04:09:19",
            ),
            array(
                "id" => 2,
                "image" => "uploads/Default/669b3860bf582.png",
                "offer" => "70",
                "title" => "Eat healthy. Stay healthy.",
                "sub_title" => "Fast Food & Restaurants",
                "description" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum fugit minimaet debitis ut distinctio optio qui voluptate natus.",
                "btn_link" => "javascript:;",
                "status" => 1,
                "created_at" => "2024-07-19 00:50:12",
                "updated_at" => "2024-07-20 04:09:04",
            ),
            array(
                "id" => 3,
                "image" => "uploads/Default/669b38561ddf0.png",
                "offer" => "25",
                "title" => "Eat healthy. Stay healthy.",
                "sub_title" => "Fast Food & Restaurants",
                "description" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum fugit minimaet debitis ut distinctio optio qui voluptate natus",
                "btn_link" => "javascript:;",
                "status" => 1,
                "created_at" => "2024-07-19 00:51:47",
                "updated_at" => "2024-07-20 04:08:54",
            ),
        );



        DB::table('sliders')->insert($sliders);

    }
}
