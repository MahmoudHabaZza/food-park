<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FooterInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $footer_infos = array(
            array(
                "id" => 1,
                "short_description" => "There are many variations of Lorem Ipsum available, but the majority have suffered.",
                "address" => "7232 Broadway Suite 308, Jackson Heights, 11372, NY, United States",
                "email" => "support@foodpark.com",
                "phone" => "+96487452145214",
                "copyright" => "Copyright 2022 FoodPark All Rights Reserved.",
                "created_at" => "2024-07-19 18:12:23",
                "updated_at" => "2024-07-19 18:12:23",
            ),
        );

        DB::table('footer_infos')->insert($footer_infos);
    }
}
