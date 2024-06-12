<?php

namespace App\Services;

use App\Models\Order;
use Cart;

class OrderService {
    public function createOrder() {
        Order::create([
            'invoice_id' => generateInvoiceId(),
            'user_id' => auth()->user()->id,
            'address' => session()->get('selectedAddress'),
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
    }
}
