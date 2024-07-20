<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = array(
            array(
                "id" => 1,
                "key" => "pusher_app_id",
                "value" => "1828827",
                "created_at" => "2024-06-25 20:33:58",
                "updated_at" => "2024-07-03 21:34:06",
            ),
            array(
                "id" => 2,
                "key" => "pusher_key",
                "value" => "0544e203f96d1d668c4f",
                "created_at" => "2024-06-25 20:33:58",
                "updated_at" => "2024-07-03 21:34:06",
            ),
            array(
                "id" => 3,
                "key" => "pusher_secret_key",
                "value" => "dc23f77c971127765435",
                "created_at" => "2024-06-25 20:33:58",
                "updated_at" => "2024-07-03 21:34:06",
            ),
            array(
                "id" => 4,
                "key" => "pusher_cluster",
                "value" => "mt1",
                "created_at" => "2024-06-25 20:33:58",
                "updated_at" => "2024-06-27 19:44:31",
            ),
            array(
                "id" => 5,
                "key" => "site_name",
                "value" => "Food Park",
                "created_at" => "2024-06-25 20:36:25",
                "updated_at" => "2024-06-25 20:36:25",
            ),
            array(
                "id" => 6,
                "key" => "site_default_currency",
                "value" => "USD",
                "created_at" => "2024-06-25 20:36:25",
                "updated_at" => "2024-06-25 20:36:25",
            ),
            array(
                "id" => 7,
                "key" => "site_currency_icon",
                "value" => "$",
                "created_at" => "2024-06-25 20:36:25",
                "updated_at" => "2024-06-25 20:36:25",
            ),
            array(
                "id" => 8,
                "key" => "site_default_currency_position",
                "value" => "left",
                "created_at" => "2024-06-25 20:36:25",
                "updated_at" => "2024-06-25 20:36:25",
            ),
            array(
                "id" => 9,
                "key" => "mail_driver",
                "value" => "smtp",
                "created_at" => "2024-07-14 19:43:00",
                "updated_at" => "2024-07-14 19:43:00",
            ),
            array(
                "id" => 10,
                "key" => "mail_host",
                "value" => "sandbox.smtp.mailtrap.io",
                "created_at" => "2024-07-14 19:43:00",
                "updated_at" => "2024-07-14 19:43:00",
            ),
            array(
                "id" => 11,
                "key" => "mail_port",
                "value" => "587",
                "created_at" => "2024-07-14 19:43:00",
                "updated_at" => "2024-07-14 19:43:00",
            ),
            array(
                "id" => 12,
                "key" => "mail_username",
                "value" => "cd8a1fd4e4db64",
                "created_at" => "2024-07-14 19:43:00",
                "updated_at" => "2024-07-14 19:43:00",
            ),
            array(
                "id" => 13,
                "key" => "mail_password",
                "value" => "880a804ef2d1c1",
                "created_at" => "2024-07-14 19:43:00",
                "updated_at" => "2024-07-14 19:43:00",
            ),
            array(
                "id" => 14,
                "key" => "mail_encryption",
                "value" => "tls",
                "created_at" => "2024-07-14 19:43:00",
                "updated_at" => "2024-07-14 19:43:00",
            ),
            array(
                "id" => 15,
                "key" => "mail_form_address",
                "value" => "support-edited@food-park.com",
                "created_at" => "2024-07-14 19:43:00",
                "updated_at" => "2024-07-14 20:13:57",
            ),
            array(
                "id" => 16,
                "key" => "mail_receiver_address",
                "value" => "habazzaofficial@gmail.com",
                "created_at" => "2024-07-14 19:43:00",
                "updated_at" => "2024-07-14 19:43:00",
            ),
            array(
                "id" => 23,
                "key" => "logo",
                "value" => "uploads/Default/669b3a5b8ab66.png",
                "created_at" => "2024-07-18 03:00:27",
                "updated_at" => "2024-07-20 04:17:31",
            ),
            array(
                "id" => 24,
                "key" => "favicon",
                "value" => "uploads/Default/669b3a7e0846b.png",
                "created_at" => "2024-07-18 03:00:27",
                "updated_at" => "2024-07-20 04:18:06",
            ),
            array(
                "id" => 25,
                "key" => "footer_logo",
                "value" => "uploads/Default/669b3a7e0bb88.png",
                "created_at" => "2024-07-18 03:00:27",
                "updated_at" => "2024-07-20 04:18:06",
            ),
            array(
                "id" => 26,
                "key" => "breadcrumb",
                "value" => "uploads/Default/669b3a7e0a5ad.jpg",
                "created_at" => "2024-07-18 03:05:49",
                "updated_at" => "2024-07-20 04:18:06",
            ),
            array(
                "id" => 27,
                "key" => "color",
                "value" => "#f86f03",
                "created_at" => "2024-07-18 18:09:20",
                "updated_at" => "2024-07-18 18:09:52",
            ),
            array(
                "id" => 28,
                "key" => "seo_title",
                "value" => "Food Park",
                "created_at" => "2024-07-18 19:55:05",
                "updated_at" => "2024-07-18 19:55:05",
            ),
            array(
                "id" => 29,
                "key" => "seo_description",
                "value" => "this is seo description of food park",
                "created_at" => "2024-07-18 19:55:05",
                "updated_at" => "2024-07-18 19:55:05",
            ),
            array(
                "id" => 30,
                "key" => "seo_keywords",
                "value" => "food,restaurant,order",
                "created_at" => "2024-07-18 19:55:05",
                "updated_at" => "2024-07-18 19:55:05",
            ),
        );



        DB::table('settings')->insert($settings);
    }
}
