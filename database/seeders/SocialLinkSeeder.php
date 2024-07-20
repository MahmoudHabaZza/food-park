<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $social_links = array(
            array(
                "id" => 1,
                "name" => "Facebook",
                "icon" => "fab fa-facebook-f",
                "link" => "https://facebook.com/",
                "status" => 1,
                "created_at" => "2024-07-19 18:14:15",
                "updated_at" => "2024-07-19 18:14:15",
            ),
            array(
                "id" => 2,
                "name" => "Twitter",
                "icon" => "fab fa-twitter",
                "link" => "https://x.com",
                "status" => 1,
                "created_at" => "2024-07-19 18:14:54",
                "updated_at" => "2024-07-19 18:14:54",
            ),
            array(
                "id" => 3,
                "name" => "LinkedIn",
                "icon" => "fab fa-linkedin-in",
                "link" => "https://linkedin.com",
                "status" => 1,
                "created_at" => "2024-07-19 18:15:22",
                "updated_at" => "2024-07-19 18:15:22",
            ),
            array(
                "id" => 4,
                "name" => "Pinterest",
                "icon" => "fab fa-pinterest-p",
                "link" => "https://pinterest.com",
                "status" => 1,
                "created_at" => "2024-07-19 18:16:22",
                "updated_at" => "2024-07-19 18:16:22",
            ),
        );

        DB::table('social_links')->insert($social_links)
;    }
}
