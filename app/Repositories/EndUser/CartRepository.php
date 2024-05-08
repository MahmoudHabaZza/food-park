<?php

namespace App\Repositories\EndUser;

use App\Interfaces\EndUser\CartRepositoryInterface;
use Illuminate\Http\Request;

class CartRepository implements CartRepositoryInterface
{
    public function addToCart(Request $request)
    {
        dd($request->all());
    }
}
