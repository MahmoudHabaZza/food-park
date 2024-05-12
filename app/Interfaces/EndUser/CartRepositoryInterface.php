<?php

namespace App\Interfaces\EndUser;

use Illuminate\Http\Request;

interface CartRepositoryInterface
{
    public function addToCart(Request $request);
    public function getCartProducts();
}
