<?php

namespace App\Interfaces\Admin;

use App\DataTables\CategoryDataTable;
use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Http\Requests\Admin\CategoryUpdatedRequest;

interface CategoryRepositoryInterface
{
    public function index(CategoryDataTable $dataTable);
    public function create();
    public function store(CategoryStoreRequest $request);
    public function edit(string $id);
    public function update(CategoryUpdatedRequest $request, string $id);
    public function destroy(string $id);
}
