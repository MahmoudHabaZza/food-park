<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use Cart;
use Exception;

class OrderService {
    public function createOrder() {
        try{

            $order = Order::create([
                'invoice_id' => generateInvoiceId(),
                'user_id' => auth()->user()->id,
                'address' => session()->get('selectedAddress'),
                'delivery_area_id' => session()->get('delivery_area_id'),
                'discount' => session()->get('coupon')['discount'] ?? 0,
                'delivery_charge' => session()->get('delivery_fee'),
                'subtotal' => cartTotal(),
                'final_total' => cartFinalTotal(session()->get('delivery_fee')),
                'product_qty' => Cart::content()->count(),
                'payment_method' => NULL,
                'payment_status' => 'pending',
                'payment_approve_date' => NULL,
                'transaction_id' => NULL,
                'coupon_info' => json_encode(session()->get('coupon')) ?? NULL,
                'currency_name' => NULL,
                'order_status' => 'pending',
            ]);

            foreach(Cart::content() as $product) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_name' => $product->name,
                    'product_id' => $product->id,
                    'unit_price' => $product->price,
                    'qty' => $product->qty,
                    'product_size' => json_encode($product->options->product_size),
                    'product_option' => json_encode($product->options->product_options),


                ]);
            }

            /** Store the final total in session to pass it to the payment gateway */
            session()->put('final_total',$order->final_total);

            /** Store the order id to grab it after completing the payment  */
            session()->put('order_id',$order->id);

            return true;
        }catch(\Exception $e) {
            logger($e);
            return false;
        }
    }
}
