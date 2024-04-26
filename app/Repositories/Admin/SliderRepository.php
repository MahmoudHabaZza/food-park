<?php

namespace App\Repositories\Admin;

use App\DataTables\SliderDataTable;
use App\Interfaces\Admin\SliderRepositoryInterface;

class SliderRepository implements SliderRepositoryInterface {
    public function index(SliderDataTable $dataTable)
    {
        return $dataTable->render('Admin.slider.index');
    }
}
