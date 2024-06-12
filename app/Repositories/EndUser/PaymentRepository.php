<?php

namespace App\Repositories\EndUser;

use App\Interfaces\EndUser\PaymentRepositoryInterface;
use App\Services\OrderService;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PaymentRepository implements PaymentRepositoryInterface {
    public function index()
    {
        if(Cart::content()->count() === 0){
            throw ValidationException::withMessages(['Add Some Products To continue to payment page']);

        }

        if(!session()->has('selectedAddress') && !session()->has('delivery_fee')) {
            throw ValidationException::withMessages(['Something Went Wrong']);
        }


        $subtotal = cartTotal();
        $delivery_fee = session()->get('delivery_fee') ?? 0;
        $discount = session()->get('coupon')['discount'] ?? 0;
        $final_total = cartFinalTotal($delivery_fee);
        return view('EndUser.pages.payment',compact('subtotal','delivery_fee','discount','final_total'));
    }
    public function makePayment(Request $request,OrderService $orderService)
    {
        $request->validate([
            'payment_gateway' => ['required','string','in:paypal']
        ]);

        try{
            $orderService->createOrder();

        }catch(\Exception $e) {
            throw $e;
        }

    }
}
