<?php

namespace Database\Seeders;

use App\Models\SectionTitle;
use App\Models\WhyChooseUs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WhyChooseUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SectionTitle::insert([
            [
                'key' => 'why_choose_top_title',
                'value' => 'Why Choose Us'
            ],
            [
                'key' => 'why_choose_main_title',
                'value' => 'Why Choose Us'
            ],
            [
                'key' => 'why_choose_sub_title',
                'value' => 'Objectively pontificate quality models before intuitive information. Dramatically recaptiualize multifunctional materials.                '
            ],
        ]);

        WhyChooseUs::factory()->count(5)->create();
    }
}
