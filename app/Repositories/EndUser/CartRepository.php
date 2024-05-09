<?php

namespace App\Repositories\EndUser;

use App\Interfaces\EndUser\CartRepositoryInterface;
use App\Models\Product;
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
            'product_options' => []
        ];
        foreach($product_options as $option) {
            $options['product_options'][] = [
                'id' => $option->id,
                'name' => $option->name,
                'price' => $option->price,
            ];
        }
        dd($options);
    }
}
