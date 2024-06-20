<?php

namespace App\Interfaces\Admin;

use App\DataTables\OrderDataTable;

interface OrderRepositoryInterface {
    public function index(OrderDataTable $dataTable);
    public function show($id);
}
