<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index() : View {
        $sliders = Slider::where('status',1)->get();
        return view('EndUser.Home.index',compact('sliders'));
    }
}
