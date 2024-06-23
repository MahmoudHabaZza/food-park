<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DeclinedOrderDataTable;
use App\DataTables\DeliveredOrderDataTable;
use App\DataTables\DeliveryAreaDataTable;
use App\DataTables\InProcessOrderDataTable;
use App\DataTables\OrderDataTable;
use App\DataTables\PendingOrderDataTable;
use App\Http\Controllers\Controller;
use App\Interfaces\Admin\OrderRepositoryInterface;
use App\Models\DeliveryArea;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $orderRepository;
    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }
    public function index(OrderDataTable $dataTable){
        return $this->orderRepository->index($dataTable);
    }
    public function show($id){
        return $this->orderRepository->show($id);
    }
    public function updateOrderStatus(Request $request,string $id){
        return $this->orderRepository->updateOrderStatus($request,$id);
    }
    public function getOrderStatus(string $id){
        return $this->orderRepository->getOrderStatus($id);
    }
    public function destroy(string $id){
        return $this->orderRepository->destroy($id);
    }
    public function pendingOrderIndex(PendingOrderDataTable $dataTable){
        return $this->orderRepository->pendingOrderIndex($dataTable);
    }
    public function inProcessOrderIndex(InProcessOrderDataTable $dataTable){
        return $this->orderRepository->inProcessOrderIndex($dataTable);
    }
    public function deliveredOrderIndex(DeliveredOrderDataTable $dataTable){
        return $this->orderRepository->deliveredOrderIndex($dataTable);
    }
    public function declinedOrderIndex(DeclinedOrderDataTable $dataTable){
        return $this->orderRepository->declinedOrderIndex($dataTable);
    }
}
