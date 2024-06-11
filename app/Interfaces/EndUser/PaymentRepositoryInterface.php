<?php

namespace App\Interfaces\EndUser;

use Illuminate\Http\Request;

interface PaymentRepositoryInterface {
    public function index();
    public function makePayment(Request $request);
}
