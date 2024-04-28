<?php

namespace App\Interfaces\Admin;

use App\DataTables\WhyChooseUsDataTable;

interface WhyChooseUsRepositoryInterface
{
    public function index(WhyChooseUsDataTable $datatable);
}
