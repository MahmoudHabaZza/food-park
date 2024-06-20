<?php

namespace App\Repositories\Admin;

use App\DataTables\OrderDataTable;
use App\Interfaces\Admin\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface {
    public function index(OrderDataTable $dataTable)
    {
        return $dataTable->render('Admin.Order.index');
    }
}
