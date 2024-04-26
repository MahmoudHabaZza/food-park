<?php

namespace App\Interfaces\Admin;

use App\DataTables\SliderDataTable;
use App\Http\Requests\Admin\SliderCreateRequest;

interface SliderRepositoryInterface {
    public function index(SliderDataTable $dataTable);
    public function create();
    public function store(SliderCreateRequest $request);
    public function edit(string $id);
}
