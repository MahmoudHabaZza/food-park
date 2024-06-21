<?php

namespace App\Interfaces\Admin;

use App\DataTables\OrderDataTable;
use Illuminate\Http\Request;

interface OrderRepositoryInterface {
    public function index(OrderDataTable $dataTable);
    public function show($id);
    public function updateOrderStatus(Request $request , string $id);
}
