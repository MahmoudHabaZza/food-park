<?php

namespace App\Interfaces\Admin;

use App\DataTables\ChefDataTable;
use App\Http\Requests\ChefCreateRequest;
use App\Http\Requests\ChefUpdateRequest;
use Illuminate\Http\Request;

interface ChefRepositoryInterface {
    public function index(ChefDataTable $dataTable);
    public function create();
    public function store(ChefCreateRequest $request);
    public function edit(string $id);
    public function update(ChefUpdateRequest $request,string $id);
    public function updateTitle(Request $request);
    public function destroy(string $id);

}
