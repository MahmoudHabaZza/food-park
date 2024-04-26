<?php

namespace App\Repositories\Admin;

use App\DataTables\SliderDataTable;
use App\Interfaces\Admin\SliderRepositoryInterface;
use Illuminate\Contracts\View\View;

class SliderRepository implements SliderRepositoryInterface {
    public function index(SliderDataTable $dataTable)
    {
        return $dataTable->render('Admin.slider.index');
    }
    public function create() : View
    {
        return view('Admin.Slider.create');
    }
}
