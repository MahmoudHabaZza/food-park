<?php

namespace App\Interfaces\Admin;

use App\DataTables\ProductDataTable;

interface ProductRepositoryInterface
{
    public function index(ProductDataTable $dataTable);
    public function create();
}
