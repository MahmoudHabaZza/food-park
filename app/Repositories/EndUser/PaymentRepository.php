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

        if($orderService->createOrder()){
            // redirect user to the selected payment gateway

            switch ($request->payment_gateway) {
                case 'paypal':
                    return response(['redirect_url'=> route('paypal.payment')]);
                    break;
                default:
                    break;
            }
        }

    }

    public function setPaypalConfig(){
        $config = [
            'mode'    => config('gatewaySettings.paypal_account_mode'), // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
            'sandbox' => [
                'client_id'         => config('gatewaySettings.paypal_api_key'),
                'client_secret'     => config('gatewaySettings.paypal_secret_key'),
                'app_id'            => 'APP-80W284485P519543T',
            ],
            'live' => [
                'client_id'         => config('gatewaySettings.paypal_api_key'),
                'client_secret'     => config('gatewaySettings.paypal_secret_key'),
                'app_id'            => env('PAYPAL_LIVE_APP_ID', ''),
            ],

            'payment_action' => 'Sale', // Can only be 'Sale', 'Authorization' or 'Order'
            'currency'       => config('gatewaySettings.paypal_account_currency'),
            'notify_url'     => env('PAYPAL_NOTIFY_URL', ''), // Change this accordingly for your application.
            'locale'         => 'en_US', // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
            'validate_ssl'   => true, // Validate SSL when creating api client.
        ];

        return $config;
    }

    public function payWithPaypal()
    {

    }
    public function paypalSuccess()
    {

    }
    public function paypalCancel()
    {

    }
}
