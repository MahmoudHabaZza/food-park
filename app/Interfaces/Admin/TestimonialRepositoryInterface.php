<?php

namespace App\Interfaces\Admin;

use App\DataTables\TestimonialDataTable;
use App\Http\Requests\TestimonialCreateRequest;
use App\Http\Requests\TestimonialUpdateRequest;
use Illuminate\Http\Request;

interface TestimonialRepositoryInterface {
    public function index(TestimonialDataTable $dataTable);
    public function updateTitle(Request $request);
    public function create();
    public function store(TestimonialCreateRequest $request);
    public function edit(string $id);
    public function update(TestimonialUpdateRequest $request, string $id);
    public function destroy(string $id);
    

}
