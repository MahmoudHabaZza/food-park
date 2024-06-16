<?php

namespace App\Interfaces\EndUser;

use App\Services\OrderService;
use Illuminate\Http\Request;

interface PaymentRepositoryInterface {
    public function index();
    public function makePayment(Request $request,OrderService $orderService);
    public function payWithPaypal();
    public function paypalSuccess();
    public function paypalCancel();
}
