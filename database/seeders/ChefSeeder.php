<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChefSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chefs = array(
            array(
                "id" => 1,
                "name" => "Ibrahim Wael",
                "image" => "uploads/Default/669b38d36a4e8.jpg",
                "title" => "Senior Chef",
                "fb" => "https://facebook.com",
                "in" => NULL,
                "x" => "https://x.com",
                "status" => 1,
                "show_at_home" => 1,
                "created_at" => "2024-07-19 00:58:54",
                "updated_at" => "2024-07-20 04:10:59",
            ),
            array(
                "id" => 2,
                "name" => "Mona Ahmed",
                "image" => "uploads/Default/669b38c810e7a.jpg",
                "title" => "Senior Chef",
                "fb" => "https://facebook.com",
                "in" => NULL,
                "x" => "https://x.com",
                "status" => 1,
                "show_at_home" => 1,
                "created_at" => "2024-07-19 00:59:15",
                "updated_at" => "2024-07-20 04:10:48",
            ),
            array(
                "id" => 3,
                "name" => "Mohammed Adel",
                "image" => "uploads/Default/669b38be30506.jpg",
                "title" => "Senior Chef",
                "fb" => "https://facebook.com",
                "in" => NULL,
                "x" => "https://x.com",
                "status" => 1,
                "show_at_home" => 1,
                "created_at" => "2024-07-19 00:59:41",
                "updated_at" => "2024-07-20 04:10:38",
            ),
            array(
                "id" => 4,
                "name" => "Ola Mohamed",
                "image" => "uploads/Default/669b38b5aced1.jpg",
                "title" => "Senior Chef",
                "fb" => "https://facebook.com",
                "in" => NULL,
                "x" => "https://x.com",
                "status" => 1,
                "show_at_home" => 1,
                "created_at" => "2024-07-19 01:00:02",
                "updated_at" => "2024-07-20 04:10:29",
            ),
            array(
                "id" => 5,
                "name" => "Mostafa Ahmed",
                "image" => "uploads/Default/669b38ad09383.jpg",
                "title" => "Senior Chef",
                "fb" => "https://facebook.com",
                "in" => NULL,
                "x" => "https://x.com",
                "status" => 1,
                "show_at_home" => 1,
                "created_at" => "2024-07-19 01:00:35",
                "updated_at" => "2024-07-20 04:10:21",
            ),
            array(
                "id" => 6,
                "name" => "Eman Ahmed",
                "image" => "uploads/Default/669b38a378a25.jpg",
                "title" => "Senior Chef",
                "fb" => "https://facebook.com",
                "in" => NULL,
                "x" => "https://x.com",
                "status" => 1,
                "show_at_home" => 1,
                "created_at" => "2024-07-19 01:00:54",
                "updated_at" => "2024-07-20 04:10:11",
            ),
        );


        DB::table('chefs')->insert($chefs);
    }
}
