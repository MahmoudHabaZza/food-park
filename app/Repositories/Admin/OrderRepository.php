<?php

namespace App\Repositories\Admin;

use App\DataTables\DeclinedOrderDataTable;
use App\DataTables\DeliveredOrderDataTable;
use App\DataTables\InProcessOrderDataTable;
use App\DataTables\OrderDataTable;
use App\DataTables\PendingOrderDataTable;
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
    public function destroy(string $id)
    {
        try{
            $order = Order::findOrFail($id);
            $order->delete();
            return response(['status' => 'success','message' => 'Order Deleted Successfully']);
        }catch(\Exception $e){
            logger($e);
            return response(['status' => 'error','message' => 'Something Went Wrong']);
        }
    }
    public function pendingOrderIndex(PendingOrderDataTable $dataTable)
    {
        return $dataTable->render('Admin.Order.pending-order-index');
    }
    public function inProcessOrderIndex(InProcessOrderDataTable $dataTable)
    {
        return $dataTable->render('Admin.Order.in-process-order-index');
    }
    public function deliveredOrderIndex(DeliveredOrderDataTable $dataTable)
    {
        return $dataTable->render('Admin.Order.delivered-order-index');

    }
    public function declinedOrderIndex(DeclinedOrderDataTable $dataTable)
    {
        return $dataTable->render('Admin.Order.declined-order-index');
    }
}
