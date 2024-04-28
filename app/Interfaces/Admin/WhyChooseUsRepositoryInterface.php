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
    public function edit(string $id);
    public function update(WhyChooseUsCreateRequest $request, string $id);
    public function updateTitle(Request $request);
    public function destroy(string $id);
}
