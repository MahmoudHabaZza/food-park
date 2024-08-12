<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Interfaces\EndUser\CouponRepositoryInterface;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    private $coupon;
    public function __construct(CouponRepositoryInterface $coupon)
    {
        $this->coupon = $coupon;
    }
    public function applyCoupon(Request $request)
    {
        return $this->coupon->applyCoupon($request);
    }
    public function removeCoupon()
    {
        return $this->coupon->removeCoupon();
    }
}
