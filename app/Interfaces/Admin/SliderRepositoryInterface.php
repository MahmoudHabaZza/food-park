<?php

namespace App\Interfaces\Admin;

use App\DataTables\SliderDataTable;

interface SliderRepositoryInterface {
    public function index(SliderDataTable $dataTable);
    public function create();
}
