<?php

namespace App\Repositories\Admin;

use App\DataTables\OrderDataTable;
use App\Interfaces\Admin\OrderRepositoryInterface;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
    public function updateOrderStatus(Request $request, string $id) : RedirectResponse
    {
        $request->validate([
            'payment_status' => ['required','in:pending,completed'],
            'order_status' => ['required','in:pending,in_process,delivered,declined'],
        ]);
        $order = Order::findOrFail($id);
        $order->update([
            'payment_status' => $request->payment_status,
            'order_status' => $request->order_status,
        ]);

        toastr()->success('Status Updated Successfully');
        return redirect()->back();
    }
}
