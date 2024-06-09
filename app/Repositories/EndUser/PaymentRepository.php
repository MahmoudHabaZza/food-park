<?php

namespace App\Repositories\EndUser;

use App\Interfaces\EndUser\PaymentRepositoryInterface;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PaymentRepository implements PaymentRepositoryInterface {
    public function index() : View
    {

        if(!session()->has('selectedAddress') && !session()->has('delivery_fee')) {
            throw ValidationException::withMessages(['Something Went Wrong']);
        }

        $subtotal = cartTotal();
        $delivery_fee = session()->get('delivery_fee') ?? 0;
        $discount = session()->get('coupon')['discount'] ?? 0;
        $final_total = cartFinalTotal($delivery_fee);
        return view('EndUser.pages.payment',compact('subtotal','delivery_fee','discount','final_total'));
    }
}
