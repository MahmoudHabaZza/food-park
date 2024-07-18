<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $section_titles = array(
            array(
                "id" => 1,
                "key" => "why_choose_top_title",
                "value" => "Why Choose Us",
                "created_at" => NULL,
                "updated_at" => NULL,
            ),
            array(
                "id" => 2,
                "key" => "why_choose_main_title",
                "value" => "Why Choose Us",
                "created_at" => NULL,
                "updated_at" => NULL,
            ),
            array(
                "id" => 3,
                "key" => "why_choose_sub_title",
                "value" => "Objectively pontificate quality models before intuitive information. Dramatically recaptiualize multifunctional materials.                ",
                "created_at" => NULL,
                "updated_at" => NULL,
            ),
            array(
                "id" => 4,
                "key" => "daily_offer_top_title",
                "value" => "Daily Offer",
                "created_at" => "2024-07-07 21:16:15",
                "updated_at" => "2024-07-07 21:33:55",
            ),
            array(
                "id" => 5,
                "key" => "daily_offer_main_title",
                "value" => "Up To 75% Off For This Day",
                "created_at" => "2024-07-07 21:16:15",
                "updated_at" => "2024-07-07 21:33:55",
            ),
            array(
                "id" => 6,
                "key" => "daily_offer_sub_title",
                "value" => "Objectively pontificate quality models before intuitive information. Dramatically recaptiualize multifunctional materials.",
                "created_at" => "2024-07-07 21:16:15",
                "updated_at" => "2024-07-07 21:33:55",
            ),
            array(
                "id" => 7,
                "key" => "chef_top_title",
                "value" => "Our Team",
                "created_at" => "2024-07-07 23:58:06",
                "updated_at" => "2024-07-07 23:58:06",
            ),
            array(
                "id" => 8,
                "key" => "chef_main_title",
                "value" => "Meet Our Experinces Team",
                "created_at" => "2024-07-07 23:58:06",
                "updated_at" => "2024-07-07 23:58:06",
            ),
            array(
                "id" => 9,
                "key" => "chef_sub_title",
                "value" => "Objectively pontificate quality models before intuitive information. Dramatically recaptiualize multifunctional materials.",
                "created_at" => "2024-07-07 23:58:06",
                "updated_at" => "2024-07-07 23:58:06",
            ),
            array(
                "id" => 10,
                "key" => "testimonial_top_title",
                "value" => "Testimonial",
                "created_at" => "2024-07-08 12:51:15",
                "updated_at" => "2024-07-08 12:54:06",
            ),
            array(
                "id" => 11,
                "key" => "testimonial_main_title",
                "value" => "Our Customar Feedbacks",
                "created_at" => "2024-07-08 12:51:15",
                "updated_at" => "2024-07-08 12:51:15",
            ),
            array(
                "id" => 12,
                "key" => "testimonial_sub_title",
                "value" => "Objectively pontificate quality models before intuitive information. Dramatically recaptiualize multifunctional materials.",
                "created_at" => "2024-07-08 12:51:15",
                "updated_at" => "2024-07-08 12:51:15",
            ),
        );

        DB::table('section_titles')->insert($section_titles);
    }
}
