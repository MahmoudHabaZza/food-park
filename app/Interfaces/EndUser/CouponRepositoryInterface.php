<?php

namespace App\Interfaces\EndUser;

use Illuminate\Http\Request;

interface CouponRepositoryInterface {
    public function applyCoupon(Request $request);
    public function removeCoupon();
}
