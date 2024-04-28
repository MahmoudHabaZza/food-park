<?php

namespace App\Interfaces\Admin;

use App\DataTables\WhyChooseUsDataTable;
use App\Http\Requests\WhyChooseUsCreateRequest;
use Illuminate\Http\Request;

interface WhyChooseUsRepositoryInterface
{
    public function index(WhyChooseUsDataTable $datatable);
    public function create();
    public function store(WhyChooseUsCreateRequest $request);
    public function updateTitle(Request $request);
}
