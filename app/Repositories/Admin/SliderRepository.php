<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\SliderRepositoryInterface;
use Illuminate\Contracts\View\View;

class SliderRepository implements SliderRepositoryInterface {
    public function index() : View
    {
        return view('Admin.Slider.index');
    }
}
