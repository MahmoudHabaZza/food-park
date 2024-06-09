<?php

namespace App\Repositories\EndUser;

use App\Interfaces\EndUser\PaymentRepositoryInterface;
use Illuminate\View\View;

class PaymentRepository implements PaymentRepositoryInterface {
    public function index() : View
    {
        return view('EndUser.pages.payment');
    }
}
