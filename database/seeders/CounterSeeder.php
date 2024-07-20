<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CounterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $counters = array(
            array(
                "id" => 1,
                "background" => asset('assets/EndUser/images/counter_bg2.jpg'),
                "counter_icon_one" => "fas fa-truck",
                "counter_count_one" => "5000",
                "counter_name_one" => "Orders",
                "counter_icon_two" => "fas fa-award",
                "counter_count_two" => "30",
                "counter_name_two" => "Winning Award",
                "counter_icon_three" => "fas fa-handshake",
                "counter_count_three" => "10000",
                "counter_name_three" => "Happy Cutomer",
                "counter_icon_four" => "fab fa-teamspeak",
                "counter_count_four" => "250",
                "counter_name_four" => "Experience Chef",
                "created_at" => "2024-07-19 17:59:26",
                "updated_at" => "2024-07-19 17:59:54",
            ),
        );

        DB::table('counters')->insert($counters);
    }
}
