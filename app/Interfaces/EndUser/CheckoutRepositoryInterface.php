<?php

namespace App\Interfaces\EndUser;

use Illuminate\Http\Request;

interface CheckoutRepositoryInterface {
    public function index();
    public function deliveryCalculation(Request $request);
    public function checkoutRedirect(Request $request);
}
