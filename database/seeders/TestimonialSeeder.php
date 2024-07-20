<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = array(
            array(
                "id" => 1,
                "image" => "uploads/Default/669b3913f2df9.png",
                "name" => "Ahmed Ali",
                "review" => "Objectively pontificate quality models before intuitive information. Dramatically recaptiualize multifunctional materials.",
                "rating" => 5,
                "show_at_home" => 1,
                "status" => 1,
                "created_at" => "2024-07-19 17:43:15",
                "updated_at" => "2024-07-20 04:12:03",
            ),
            array(
                "id" => 2,
                "image" => "uploads/Default/669b3909d3e4e.png",
                "name" => "Mohammed Ali",
                "review" => "Objectively pontificate quality models before intuitive information. Dramatically recaptiualize multifunctional materials.",
                "rating" => 4,
                "show_at_home" => 1,
                "status" => 1,
                "created_at" => "2024-07-19 17:43:37",
                "updated_at" => "2024-07-20 04:11:53",
            ),
            array(
                "id" => 3,
                "image" => "uploads/Default/669b38ff7949f.jpg",
                "name" => "Mostafa Ali",
                "review" => "Objectively pontificate quality models before intuitive information. Dramatically recaptiualize multifunctional materials.",
                "rating" => 5,
                "show_at_home" => 1,
                "status" => 1,
                "created_at" => "2024-07-19 17:44:02",
                "updated_at" => "2024-07-20 04:11:43",
            ),
            array(
                "id" => 4,
                "image" => "uploads/Default/669b38f702138.jpg",
                "name" => "Ibrahim Mohammed",
                "review" => "Objectively pontificate quality models before intuitive information. Dramatically recaptiualize multifunctional materials.",
                "rating" => 5,
                "show_at_home" => 1,
                "status" => 1,
                "created_at" => "2024-07-19 17:44:26",
                "updated_at" => "2024-07-20 04:11:35",
            ),
        );



        DB::table('testimonials')->insert($testimonials);
    }
}
