<?php

namespace App\Interfaces\EndUser;

use Illuminate\Http\Request;

interface CartRepositoryInterface
{
    public function index();
    public function addToCart(Request $request);
    public function getCartProducts();
    public function removeCartItem($rowId);
    public function updateCartQty(Request $request);
}
