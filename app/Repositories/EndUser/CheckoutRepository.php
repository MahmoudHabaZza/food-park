<?php

namespace App\Repositories\EndUser;

use App\Interfaces\EndUser\CheckoutRepositoryInterface;
use App\Models\Address;
use App\Models\DeliveryArea;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CheckoutRepository implements CheckoutRepositoryInterface {
    public function index()
    {
        if(Cart::content()->count() === 0){
            toastr()->error('Add Some Food To Continue to Checkout Page');
            return redirect()->back();

        }

        $userAddresses = Address::where('user_id',auth()->user()->id)->get();
        $supportedAreas = DeliveryArea::where('status',1)->get();
        return view('EndUser.pages.checkout',compact('userAddresses','supportedAreas'));
    }
    public function deliveryCalculation(Request $request){
        try{
            $address = Address::findOrFail($request->addressId);
            $deliveryFee = $address->deliveryArea->delivery_fee;
            $finalTotal = cartFinalTotal() + $deliveryFee;
            return response(['deliveryFee' => $deliveryFee,'finalTotal' => $finalTotal ]);
        }catch(\Exception) {
            return response(['status'=> 'error','message'=> 'something went wrong!']);
        }

    }
    public function checkoutRedirect(Request $request)
    {
        $request->validate([
            'address' => ['required','integer']
        ]);
        $address = Address::with('deliveryArea')->findOrFail($request->address);
        $selectedAddress = $address->address .' , Area :  '. $address->deliveryArea->area_name;
        $delivery_fee = $address->deliveryArea->delivery_fee;
        session()->put('selectedAddress',$selectedAddress);
        session()->put('delivery_area_id',$address->deliveryArea->id);
        session()->put('delivery_fee',$delivery_fee);
        return response(['redirect_url' => route('payment.index')]);

    }
}
