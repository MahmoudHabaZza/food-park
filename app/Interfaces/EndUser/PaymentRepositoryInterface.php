<?php

namespace App\Interfaces\EndUser;

use App\Services\OrderService;
use Illuminate\Http\Request;

interface PaymentRepositoryInterface {
    public function index();
    public function makePayment(Request $request,OrderService $orderService);
    public function payWithPaypal();
    public function paypalSuccess(Request $request,OrderService $orderService);
    public function paypalCancel(Request $request);
    public function paymentSuccess();
    public function paymentCancel();
    public function payWithStripe();
    public function stripeSuccess(Request $request,OrderService $orderService);
    public function stripeCancel();
    public function razorpayRedirect();
    public function payWithRazorpay(Request $request,OrderService $orderService);
}
