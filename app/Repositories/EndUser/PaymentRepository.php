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
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use Razorpay\Api\Api as RazorpayApi;

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
            'payment_gateway' => ['required', 'string', 'in:paypal,stripe,razorpay']
        ]);

        if ($orderService->createOrder()) {
            // redirect user to the selected payment gateway

            switch ($request->payment_gateway) {
                case 'paypal':
                    return response(['redirect_url' => route('paypal.payment')]);
                    break;
                case 'stripe':
                    return response(['redirect_url' => route('stripe.payment')]);
                    break;
                case 'razorpay':
                    return response(['redirect_url' => route('razorpay.redirect')]);
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
                'app_id'            => config('gatewaySettings.paypal_app_id'),
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
        if (!session()->has('order_id')) {
            return redirect('/')->withErrors(['error' => 'unauthorized Access']);
        }
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



        if (isset($response['id']) && $response['id'] != NULL) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        } else {
            session()->put('payment-cancel', true);
            return redirect()->route('paypal.cancel')->withErrors(['error' => $response['error']['message']]);
        }
    }
    public function paypalSuccess(Request $request, OrderService $orderService)
    {
        $config = $this->setPaypalConfig();
        $provider = new PayPalClient($config);
        $provider->getAccessToken();


        $response = $provider->capturePaymentOrder($request->token);



        if (isset($response['status']) && $response['status'] === 'COMPLETED') {
            $order_id = session()->get('order_id');
            $captures = $response['purchase_units'][0]['payments']['captures'][0];
            $payment_info = [
                'transaction_id' => $captures['id'],
                'currency' => $captures['amount']['currency_code'],
                'status' => $captures['status'],

            ];


            OrderPaymentUpdateEvent::dispatch($order_id, $payment_info, 'PayPal');
            OrderPlacedNotificationEvent::dispatch($order_id);



            $orderService->clearSession();
            session()->put('payment-success', true);
            return redirect()->route('payment.success');
        } else {
            session()->put('payment-cancel', true);
            return redirect()->route('paypal.cancel')->withErrors(['error' => $response['errors']['message']]);
        }
    }
    public function paypalCancel(Request $request)
    {


        return redirect()->route('payment.cancel');
    }
    public function paymentSuccess()
    {
        if (session()->has('payment-success') && session()->get('payment-success') === true) {
            session()->forget('payment-success');
            return view('EndUser.pages.payment-success');
        } else {
            return redirect('/')->withErrors(['error' => 'Unauthorized Access']);
        }
    }
    public function paymentCancel()
    {
        if (session()->has('payment-cancel') && session()->get('payment-cancel') === true) {
            session()->forget('payment-cancel');
            return view('EndUser.pages.payment-cancel');
        } else {
            return redirect('/')->withErrors(['error' => 'unauthorized Access']);
        }
    }

    public function payWithStripe()
    {

        if (!session()->has('order_id')) {
            return redirect('/')->withErrors(['error' => 'unauthorized Access']);
        }

        $final_total = session()->get('final_total');
        $payableAmount = round($final_total * config('gatewaySettings.paypal_currency_rate') * 100); // $10 => 1000
        Stripe::setApiKey(config('gatewaySettings.stripe_secret_key'));

        $response = StripeSession::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => config('gatewaySettings.stripe_account_currency'),
                        'product_data' => [
                            'name' => 'Product'
                        ],
                        'unit_amount' => $payableAmount,
                    ],
                    'quantity' => 1
                ]
            ],
            'mode' => 'payment',
            'success_url' => route('stripe.success') . '?session_id={CHECKOUT_SESSION_ID}', //
            'cancel_url' => route('stripe.cancel')
        ]);

        return redirect()->away($response->url);
    }

    public function stripeSuccess(Request $request, OrderService $orderService)
    {
        try {
            $sessionId = $request->session_id;
            Stripe::setApiKey(config('gatewaySettings.stripe_secret_key'));
            $response = StripeSession::retrieve($sessionId);
            if ($response->payment_status === 'paid') {
                $orderId = session()->get('order_id');
                $payment_info = [
                    'transaction_id' => $response->payment_intent,
                    'currency' => $response->currency,
                    'status' => 'COMPLETED'
                ];

                OrderPaymentUpdateEvent::dispatch($orderId, $payment_info, 'Stripe');
                OrderPlacedNotificationEvent::dispatch($orderId);

                $orderService->clearSession();

                session()->put('payment-success', true);
                return redirect()->route('payment.success');
            } else {
                session()->put('payment-cancel', true);
                return redirect()->route('stripe.cancel');
            }
        } catch (\Exception) {
            return redirect('/')->withErrors(['error' => 'unauthorized Access']);
        }
    }
    public function stripeCancel()
    {
        return redirect()->route('payment.cancel');
    }
    public function razorpayRedirect()
    {
        if (!session()->has('order_id')) {
            return redirect('/')->withErrors(['error' => 'Unauthorized Access']);
        }
        return view('EndUser.pages.razorpay-redirect');
    }
    public function payWithRazorpay(Request $request, OrderService $orderService)
    {
        $api = new RazorpayApi(
            config('gatewaySettings.razorpay_api_key'),
            config('gatewaySettings.razorpay_secret_key')
        );

        if ($request->has('razorpay_payment_id') && $request->filled('razorpay_payment_id')) {
            try {

                $final_total = session()->get('final_total');
                $payableAmount = round($final_total * config('gatewaySettings.razorpay_currency_rate') * 100);

                $response = $api->payment->fetch($request->razorpay_payment_id)
                    ->capture(['amount' => $payableAmount]); // to ensure that the payable amount is the final total

                if ($response['status'] === 'captured') {
                    $orderId = session()->get('order_id');
                    $payment_info = [
                        'transaction_id' => $response->id,
                        'currency' => config('settings.site_default_currency'),
                        'status' => 'COMPLETED',
                    ];

                    OrderPaymentUpdateEvent::dispatch($orderId, $payment_info, 'Razorpay');
                    OrderPlacedNotificationEvent::dispatch($orderId);

                    $orderService->clearSession();

                    session()->put('payment-success', true);
                    return redirect()->route('payment.success');
                } else {
                    session()->put('payment-cancel', true);
                    return redirect()->route('payment.cancel');
                }
            } catch (\Exception $e) {
                logger($e->getMessage());
                session()->put('payment-cancel', true);
                return redirect()->route('payment.cancel')->withErrors(['error' => $e->getMessage()]);
            }
        } else {
            return redirect('/')->withErrors(['error' => 'unauthorized Access']);
        }
    }
}
