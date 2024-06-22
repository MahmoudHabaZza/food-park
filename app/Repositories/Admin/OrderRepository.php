<?php

namespace App\Repositories\Admin;

use App\DataTables\OrderDataTable;
use App\Interfaces\Admin\OrderRepositoryInterface;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
    public function updateOrderStatus(Request $request, string $id) : RedirectResponse|Response
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

        if($request->ajax()){
            return response(['message' => 'Order Status Updated Successfully']);
        }
        toastr()->success('Status Updated Successfully');
        return redirect()->back();
    }
    public function getOrderStatus(string $id)
    {
        $orderStatus = Order::select(['payment_status','order_status'])->findOrFail($id);
        return response($orderStatus);
    }
}
