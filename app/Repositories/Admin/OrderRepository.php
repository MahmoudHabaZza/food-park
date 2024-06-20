<?php

namespace App\Repositories\Admin;

use App\DataTables\OrderDataTable;
use App\Interfaces\Admin\OrderRepositoryInterface;
use App\Models\Order;

class OrderRepository implements OrderRepositoryInterface {
    public function index(OrderDataTable $dataTable)
    {
        return $dataTable->render('Admin.Order.index');
    }
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('Admin.Order.show',compact('order'));
    }
}
