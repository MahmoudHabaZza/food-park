<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentGatewaySettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payment_gateway_settings = array(
            array(
                "id" => 1,
                "key" => "paypal_status",
                "value" => "1",
                "created_at" => "2024-06-17 22:54:58",
                "updated_at" => "2024-06-20 16:04:14",
            ),
            array(
                "id" => 2,
                "key" => "paypal_account_mode",
                "value" => "sandbox",
                "created_at" => "2024-06-17 22:54:58",
                "updated_at" => "2024-06-17 22:54:58",
            ),
            array(
                "id" => 3,
                "key" => "paypal_country",
                "value" => "US",
                "created_at" => "2024-06-17 22:54:58",
                "updated_at" => "2024-06-17 22:54:58",
            ),
            array(
                "id" => 4,
                "key" => "paypal_account_currency",
                "value" => "USD",
                "created_at" => "2024-06-17 22:54:58",
                "updated_at" => "2024-06-17 22:54:58",
            ),
            array(
                "id" => 5,
                "key" => "paypal_currency_rate",
                "value" => "1",
                "created_at" => "2024-06-17 22:54:58",
                "updated_at" => "2024-06-17 22:54:58",
            ),
            array(
                "id" => 6,
                "key" => "paypal_api_key",
                "value" => "AaohoJ6P9rMfSP3gXad2FmKvTF9Lfrt_4b_sgnTlDl6C20SAo9o0neVJsfZIeR4ZPakbhfGCTQu6l8Cl",
                "created_at" => "2024-06-17 22:54:58",
                "updated_at" => "2024-06-17 22:54:58",
            ),
            array(
                "id" => 7,
                "key" => "paypal_secret_key",
                "value" => "EOJyk-uoSndv-5my_Ufslj7UZZCETr7D6GO1XoZC05bpcvK32wm3DuXfAOol8Nf1ntspwUvJDvEFPW_T",
                "created_at" => "2024-06-17 22:54:58",
                "updated_at" => "2024-06-18 22:54:35",
            ),
            array(
                "id" => 8,
                "key" => "paypal_app_id",
                "value" => "APP-80W284485P519543T",
                "created_at" => "2024-06-18 17:50:51",
                "updated_at" => "2024-06-18 17:50:51",
            ),
            array(
                "id" => 9,
                "key" => "paypal_image",
                "value" => asset('assets/Admin/img/paypal.png'),
                "created_at" => "2024-06-18 17:59:05",
                "updated_at" => "2024-06-18 17:59:05",
            ),
            array(
                "id" => 10,
                "key" => "paypal_logo",
                "value" => asset('assets/Admin/img/paypal.png'),
                "created_at" => "2024-06-18 20:27:47",
                "updated_at" => "2024-06-18 22:51:09",
            ),
            array(
                "id" => 11,
                "key" => "stripe_logo",
                "value" => asset('assets/EndUser/images/stripe.jpeg'),
                "created_at" => "2024-06-18 21:05:56",
                "updated_at" => "2024-06-18 22:50:23",
            ),
            array(
                "id" => 12,
                "key" => "stripe_status",
                "value" => "1",
                "created_at" => "2024-06-18 21:05:56",
                "updated_at" => "2024-06-20 16:05:32",
            ),
            array(
                "id" => 13,
                "key" => "stripe_country",
                "value" => "EG",
                "created_at" => "2024-06-18 21:05:56",
                "updated_at" => "2024-06-18 21:05:56",
            ),
            array(
                "id" => 14,
                "key" => "stripe_account_currency",
                "value" => "USD",
                "created_at" => "2024-06-18 21:05:56",
                "updated_at" => "2024-06-18 21:05:56",
            ),
            array(
                "id" => 15,
                "key" => "stripe_currency_rate",
                "value" => "1",
                "created_at" => "2024-06-18 21:05:56",
                "updated_at" => "2024-06-18 21:05:56",
            ),
            array(
                "id" => 16,
                "key" => "stripe_api_key",
                "value" => "pk_test_51PTAn9GYSM3i0rimswBO6gKHpZQRW5BalSZNcmeQy2NyEF9DOvuNzAxI5D6W9ulBQpmXIM0HP4wcuh5VqD2WD0TM00ro5O3tDY",
                "created_at" => "2024-06-18 21:05:56",
                "updated_at" => "2024-06-18 22:50:23",
            ),
            array(
                "id" => 17,
                "key" => "stripe_secret_key",
                "value" => "sk_test_51PTAn9GYSM3i0rimNOxu7ioh5jnYMUfvzElRhKli8uVZxkySVxS1Yv4TO5x1pZazpmtjOVg0bz8u6OPlV4GENLqh00iFumBoVP",
                "created_at" => "2024-06-18 21:05:56",
                "updated_at" => "2024-06-18 22:50:23",
            ),
            array(
                "id" => 18,
                "key" => "razorpay_logo",
                "value" => asset('assets/EndUser/images/razorpay.jpeg'),
                "created_at" => "2024-06-20 00:20:43",
                "updated_at" => "2024-06-20 00:20:43",
            ),
            array(
                "id" => 19,
                "key" => "razorpay_status",
                "value" => "1",
                "created_at" => "2024-06-20 00:20:43",
                "updated_at" => "2024-06-20 00:20:43",
            ),
            array(
                "id" => 20,
                "key" => "razorpay_country",
                "value" => "ME",
                "created_at" => "2024-06-20 00:20:43",
                "updated_at" => "2024-06-20 00:20:43",
            ),
            array(
                "id" => 21,
                "key" => "razorpay_account_currency",
                "value" => "EUR",
                "created_at" => "2024-06-20 00:20:43",
                "updated_at" => "2024-06-20 00:20:43",
            ),
            array(
                "id" => 22,
                "key" => "razorpay_currency_rate",
                "value" => ".92",
                "created_at" => "2024-06-20 00:20:43",
                "updated_at" => "2024-06-20 00:20:43",
            ),
            array(
                "id" => 23,
                "key" => "razorpay_api_key",
                "value" => "rzp_test_K7CipNQYyyMPiS",
                "created_at" => "2024-06-20 00:20:43",
                "updated_at" => "2024-06-20 02:48:33",
            ),
            array(
                "id" => 24,
                "key" => "razorpay_secret_key",
                "value" => "zSBmNMorJrirOrnDrbOd1ALO",
                "created_at" => "2024-06-20 00:20:43",
                "updated_at" => "2024-06-20 02:48:33",
            ),
        );

        DB::table('payment_gateway_settings')->insert($payment_gateway_settings);
    }
}
