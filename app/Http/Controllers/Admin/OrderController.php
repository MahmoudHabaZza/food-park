<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\OrderDataTable;
use App\Http\Controllers\Controller;
use App\Interfaces\Admin\OrderRepositoryInterface;
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
}
