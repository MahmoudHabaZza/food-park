<?php

namespace App\Interfaces\Admin;

use App\DataTables\DeclinedOrderDataTable;
use App\DataTables\DeliveredOrderDataTable;
use App\DataTables\InProcessOrderDataTable;
use App\DataTables\OrderDataTable;
use App\DataTables\PendingOrderDataTable;
use Illuminate\Http\Request;

interface OrderRepositoryInterface {
    public function index(OrderDataTable $dataTable);
    public function show($id);
    public function updateOrderStatus(Request $request , string $id);
    public function getOrderStatus(string $id);
    public function destroy(string $id);
    public function pendingOrderIndex(PendingOrderDataTable $dataTable);
    public function inProcessOrderIndex(InProcessOrderDataTable $dataTable);
    public function deliveredOrderIndex(DeliveredOrderDataTable $dataTable);
    public function declinedOrderIndex(DeclinedOrderDataTable $dataTable);
}
