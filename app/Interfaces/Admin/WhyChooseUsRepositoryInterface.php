<?php

namespace App\Interfaces\Admin;

use App\DataTables\WhyChooseUsDataTable;
use Illuminate\Http\Request;

interface WhyChooseUsRepositoryInterface
{
    public function index(WhyChooseUsDataTable $datatable);
    public function create();
    public function updateTitle(Request $request);
}
