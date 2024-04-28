<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Models\SectionTitle;
use App\Models\Slider;
use App\Models\WhyChooseUs;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    //
    public function index(): View
    {
        $sliders = Slider::where('status', 1)->get();
        $why_choose_us = WhyChooseUs::where('status', 1)->get();
        $sectionTitles = $this->getSectionTitles();
        $sections = WhyChooseUs::where('status', 1)->get();
        return view('EndUser.Home.index', compact('sliders', 'why_choose_us', 'sectionTitles', 'sections'));
    }

    public function getSectionTitles(): Collection
    {
        $keys = [
            'why_choose_top_title',
            'why_choose_main_title',
            'why_choose_sub_title'
        ];
        return SectionTitle::whereIn('key', $keys)->pluck('value', 'key');
    }
}
