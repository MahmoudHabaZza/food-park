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
    public function paypalSuccess() {
        return $this->paymentRepository->paypalSuccess();
    }
    public function paypalCancel() {
        return $this->paymentRepository->paypalCancel();
    }
}
