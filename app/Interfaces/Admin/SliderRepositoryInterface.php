<?php

namespace App\Interfaces\Admin;

use App\DataTables\SliderDataTable;
use App\Http\Requests\Admin\SliderCreateRequest;
use App\Http\Requests\Admin\SliderUpdateRequest;

interface SliderRepositoryInterface {
    public function index(SliderDataTable $dataTable);
    public function create();
    public function store(SliderCreateRequest $request);
    public function edit(string $id);
    public function update(SliderUpdateRequest $request , string $id);
    public function destroy(string $id);
}
