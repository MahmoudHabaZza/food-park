<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Interfaces\EndUser\PaymentRepositoryInterface;
use App\Services\OrderService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private $paymentRepository;
    public function __construct(PaymentRepositoryInterface $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }
    public function index(){
        return $this->paymentRepository->index();
    }
    public function makePayment(Request $request , OrderService $orderService) {
        return $this->paymentRepository->makePayment($request , $orderService);
    }
    public function payWithPaypal() {
        return $this->paymentRepository->payWithPaypal();
    }
    public function paypalSuccess(Request $request,OrderService $orderService) {
        return $this->paymentRepository->paypalSuccess($request, $orderService);
    }
    public function paypalCancel(Request $request) {
        return $this->paymentRepository->paypalCancel($request);
    }
    public function paymentSuccess() {
        return $this->paymentRepository->paymentSuccess();
    }

    public function paymentCancel() {
        return $this->paymentRepository->paymentCancel();
    }
    public function payWithStripe(){
        return $this->paymentRepository->payWithStripe();
    }
    public function stripeSuccess(Request $request,OrderService $orderService){
        return $this->paymentRepository->stripeSuccess($request,$orderService);
    }
    public function stripeCancel(){
        return $this->paymentRepository->stripeCancel();
    }
    public function razorpayRedirect(){
        return $this->paymentRepository->razorpayRedirect();
    }
    public function payWithRazorpay(Request $request){
        return $this->paymentRepository->payWithRazorpay($request);
    }
}
