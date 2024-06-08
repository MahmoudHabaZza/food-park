<?php

namespace App\Repositories\EndUser;

use App\Interfaces\EndUser\CheckoutRepositoryInterface;
use App\Models\Address;
use App\Models\DeliveryArea;
use Illuminate\Http\Request;

class CheckoutRepository implements CheckoutRepositoryInterface {
    public function index()
    {
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
}
