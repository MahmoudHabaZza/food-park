<?php

use App\Models\Order;
use Carbon\Carbon;

if (!function_exists('generateUniqueSlug')) {
    function generateUniqueSlug(string $model, string $name)
    {
        $modelClass = "App\\Models\\$model";
        if (!class_exists($modelClass)) {
            throw new \InvalidArgumentException("Model $model Not Found");
        }

        $slug = Str::slug($name);
        $count = 2;

        while ($modelClass::where('slug', $slug)->exists()) {
            $slug = Str::slug($name) . '-' . $count;
            $count++;
        }


        return $slug;
    }

    if (!function_exists('currencyPosition')) {
        function currencyPosition($price)
        {
            if (config('settings.site_default_currency_position') === 'left') {
                return config('settings.site_currency_icon') . $price;
            } else {
                return $price . config('settings.site_currency_icon');
            }
        }
    }


    if (!function_exists('cartTotal')) {
        function cartTotal()
        {
            $total = 0;
            foreach (Cart::content() as $item) {
                $productPrice = $item->price;
                $productSize = $item->options?->product_size['price'] ?? 0;
                $productOptions = 0;
                foreach ($item->options->product_options as $option) {
                    $productOptions += $option['price'];
                }

                $total += ($productPrice + $productSize + $productOptions) * $item->qty;
            }

            return $total;
        }
    }

    // Update Product Total Price
    if (!function_exists('cartProductTotal')) {
        function cartProductTotal($rowId)
        {
            $total = 0;

            $product = Cart::get($rowId);
            $productPrice = $product->price;
            $productSize = $product->options?->product_size['price'] ?? 0;
            $productOptions = 0;
            foreach ($product->options->product_options as $option) {
                $productOptions += $option['price'];
            }

            $total += ($productPrice + $productSize + $productOptions) * $product->qty;


            return $total;
        }
    }
    // Calculate Cart Final total
    if (!function_exists('cartFinalTotal')) {
        function cartFinalTotal($deliveryFee = 0)
        {

            $finalTotal = 0;

            if (session()->has('coupon')) {
                if (Cart::content()->count() > 0) {
                    $finalTotal = (cartTotal() + $deliveryFee) - session()->get('coupon')['discount'];
                    return $finalTotal;
                } else {
                    return ($finalTotal + $deliveryFee);
                }
            } else {
                $finalTotal = cartTotal() + $deliveryFee;
                return $finalTotal;
            }
        }
    }

    if (!function_exists('generateInvoiceId')) {
        function generateInvoiceId()
        {
            $invoiceId = 'INV-' . Carbon::now()->format('YmdHis') . rand(1, 99999);


            while (Order::where('invoice_id', $invoiceId)->exists()) {
                $invoiceId = 'INV-' . Carbon::now()->format('YmdHis') . rand(1, 99999);
            }

            return $invoiceId;
        }
    }
}
