<?php

namespace App\Interfaces\Admin;

use App\DataTables\BlogDataTable;
use App\Http\Requests\BlogCreateRequest;
use App\Http\Requests\BlogUpdateRequest;

interface BlogRepositoryInterface
{
    public function index(BlogDataTable $dataTable);
    public function create();
    public function store(BlogCreateRequest $request);
    public function edit(string $id);
    public function update(BlogUpdateRequest $request, string $id);
    public function destroy(string $id);
}
