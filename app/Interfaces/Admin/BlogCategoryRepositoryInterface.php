<?php

namespace App\Interfaces\Admin;

use App\DataTables\BlogCategoryDataTable;
use Illuminate\Http\Request;

interface BlogCategoryRepositoryInterface
{
    public function index(BlogCategoryDataTable $dataTable);
    public function create();
    public function store(Request $request);
    public function edit(string $id);
    public function update(Request $request,string $id);
    public function destroy(string $id);
}
