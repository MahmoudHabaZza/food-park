<?php

namespace App\Interfaces\Admin;

use App\DataTables\ProductDataTable;
use App\Http\Requests\Admin\ProductCreateRequest;

interface ProductRepositoryInterface
{
    public function index(ProductDataTable $dataTable);
    public function create();
    public function store(ProductCreateRequest $request);
    public function edit(string $id);
}
