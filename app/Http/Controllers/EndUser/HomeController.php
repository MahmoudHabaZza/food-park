<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\WhyChooseUs;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(): View
    {
        $sliders = Slider::where('status', 1)->get();
        $why_choose_us = WhyChooseUs::where('status', 1)->get();
        return view('EndUser.Home.index', compact('sliders', 'why_choose_us'));
    }
}
