<?php

namespace App\Repositories\EndUser;

use App\Events\OrderPaymentUpdateEvent;
use App\Events\OrderPlacedNotificationEvent;
use App\Interfaces\EndUser\PaymentRepositoryInterface;
use App\Services\OrderService;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Validation\ValidationException;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentRepository implements PaymentRepositoryInterface
{
    public function index()
    {
        if (Cart::content()->count() === 0) {
            throw ValidationException::withMessages(['Add Some Products To continue to payment page']);
        }

        if (!session()->has('selectedAddress') && !session()->has('delivery_fee')) {
            throw ValidationException::withMessages(['Something Went Wrong']);
        }


        $subtotal = cartTotal();
        $delivery_fee = session()->get('delivery_fee') ?? 0;
        $discount = session()->get('coupon')['discount'] ?? 0;
        $final_total = cartFinalTotal($delivery_fee);
        return view('EndUser.pages.payment', compact('subtotal', 'delivery_fee', 'discount', 'final_total'));
    }
    public function makePayment(Request $request, OrderService $orderService)
    {

        $request->validate([
            'payment_gateway' => ['required', 'string', 'in:paypal']
        ]);



        if ($orderService->createOrder()) {
            // redirect user to the selected payment gateway

            switch ($request->payment_gateway) {
                case 'paypal':
                    return response(['redirect_url' => route('paypal.payment')]);
                    break;
                default:
                    break;
            }
        }
    }

    public function setPaypalConfig()
    {
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
        $final_total = session()->get('final_total');
        $payableAmount = round($final_total * config('gatewaySettings.paypal_currency_rate'));
        // dd($payableAmount);
        $config = $this->setPaypalConfig();
        $provider = new PayPalClient($config);
        $provider->getAccessToken();

        $response = $provider->createOrder([
            'intent' => 'CAPTURE',
            'application_context' => [
                'return_url' => route('paypal.success'),
                'cancel_url' => route('paypal.cancel')
            ],
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => config('gatewaySettings.paypal_account_currency'),
                        'value' => $payableAmount
                    ]

                ]
            ]
        ]);



        if(isset($response['id']) && $response['id'] != NULL){
            foreach($response['links'] as $link){
                if($link['rel'] === 'approve'){
                    return redirect()->away($link['href']);
                }
            }
        }else {
            session()->put('payment-cancel',true);
            return redirect()->route('paypal.cancel')->withErrors(['error' => $response['error']['message']]);
        }
    }
    public function paypalSuccess(Request $request,OrderService $orderService)
    {
        $config = $this->setPaypalConfig();
        $provider = new PayPalClient($config);
        $provider->getAccessToken();


        $response = $provider->capturePaymentOrder($request->token);



        if(isset($response['status']) && $response['status'] === 'COMPLETED'){
            $order_id = session()->get('order_id');
            $captures = $response['purchase_units'][0]['payments']['captures'][0];
            $payment_info = [
                'transaction_id' => $captures['id'],
                'currency' => $captures['amount']['currency_code'],
                'status' => $captures['status'],

            ];


            OrderPaymentUpdateEvent::dispatch($order_id,$payment_info,'PayPal');
            OrderPlacedNotificationEvent::dispatch($order_id);



            $orderService->clearSession();
            session()->put('payment-success',true);
            return redirect()->route('payment.success');

        }else {
            session()->put('payment-cancel',true);
            return redirect()->route('paypal.cancel')->withErrors(['error' => $response['errors']['message']]);

        }


    }
    public function paypalCancel(Request $request)
    {


        return redirect()->route('payment.cancel');
    }
    public function paymentSuccess()
    {
        if(session()->has('payment-success') && session()->get('payment-success') === true){
            session()->forget('payment-success');
            return view('EndUser.pages.payment-success');
        }else {
            return redirect('/')->withErrors(['error' => 'Unauthorized Access']);
        }
    }
    public function paymentCancel()
    {
        if(session()->has('payment-cancel') && session()->get('payment-cancel') === true) {
            session()->forget('payment-cancel');
            return view('EndUser.pages.payment-cancel');
        }else {
            return redirect('/')->withErrors(['error' => 'unauthorized Access']);
        }
    }
}
