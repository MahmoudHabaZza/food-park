<?php

namespace App\Repositories\EndUser;

use App\Interfaces\EndUser\CartRepositoryInterface;
use App\Models\Product;
use Cart;
use Illuminate\Http\Request;

class CartRepository implements CartRepositoryInterface
{
    public function addToCart(Request $request)
    {
        $product = Product::with(['sizes', 'options'])->findOrFail($request->product_id);
        $product_size = $product->sizes->where('id', $request->product_size)->first();
        $product_options = $product->options->whereIn('id', $request->product_option);

        $options = [
            'product_size' => [
                'id' => $product_size->id,
                'name' => $product_size->name,
                'price' => $product_size->price
            ],
            'product_options' => [],
            'product_info' => [
                'image' => $product->thumb_image,
                'slug' => $product->slug,


            ]
        ];
        foreach ($product_options as $option) {
            $options['product_options'][] = [
                'id' => $option?->id,
                'name' => $option?->name,
                'price' => $option?->price, // ?-> is null safe operator
            ];
        }

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->quantity,
            'price' => $product->offer_price > 0 ? $product->offer_price : $product->price,
            'weight' => 0,
            'options' => $options,
        ]);

        return response(['status' => 'success', 'message' => 'Add To Card Successfully']);
    }
}
