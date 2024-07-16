<?php

namespace App\Interfaces\Admin;

use App\DataTables\PageBuilderDataTable;
use Illuminate\Http\Request;

interface PageBuilderRepositoryInterface
{
    public function index(PageBuilderDataTable $dataTable);
    public function create();
    public function store(Request $request);
    public function edit(string $id);
    public function update(Request $request, string $id);
    public function destroy(string $id);
}
