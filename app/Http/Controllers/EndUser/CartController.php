<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Interfaces\EndUser\CartRepositoryInterface;
use Illuminate\Http\Request;

class CartController extends Controller
{

    private $cartRepository;
    public function __construct(CartRepositoryInterface $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function addToCart(Request $request)
    {
        return $this->cartRepository->addToCart($request);
    }
}