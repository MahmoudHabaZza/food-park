<?php

namespace App\Repositories\EndUser;

use App\Interfaces\EndUser\CartRepositoryInterface;
use App\Models\Product;
use Cart;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartRepository implements CartRepositoryInterface
{

    public function index() : View
    {
        return view('EndUser.Pages.cart-view');
    }

    public function addToCart(Request $request)
    {


        try {
            $product = Product::with(['sizes', 'options'])->findOrFail($request->product_id);
            $product_size = $product->sizes->where('id', $request->product_size)->first();
            $product_options = $product->options->whereIn('id', $request->product_option);

            $options = [
                'product_size' => [],
                'product_options' => [],
                'product_info' => [
                    'image' => $product->thumb_image,
                    'slug' => $product->slug,


                ]
            ];

            if ($product_size !== null) {
                $options['product_size'] = [
                    'id' => $product_size->id,
                    'name' => $product_size->name,
                    'price' => $product_size->price // ?-> is null safe operator
                ];
            }
            foreach ($product_options as $option) {
                $options['product_options'][] = [
                    'id' => $option?->id,
                    'name' => $option?->name,
                    'price' => $option?->price,
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


            return response(['status' => 'success', 'message' => 'Add To Card Successfully'], 200);
        } catch (\Exception $e) {

            return response(['status' => 'error', 'message' => 'Something Went Wrong'], 500);
            // return response(['status' => 'error', 'message' => 'Something Went Wrong!'], 500);
        }
    }


    public function getCartProducts()
    {
        return view('EndUser.Pages.ajax-files.sidebar-cart-products')->render();
    }

    // Remove Cart Item From Sidebar
    public function removeCartItem($rowId)
    {
        try {
            Cart::remove($rowId);
            return response(['status' => 'success', 'message' => 'Item Removed Successfully'], 200);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Something Went Wrong'], 500);
        }
    }
}
