<?php

namespace App\Repositories\EndUser;

use App\Interfaces\EndUser\CouponRepositoryInterface;
use App\Models\Coupon;
use Cart;
use Illuminate\Http\Request;

class CouponRepository implements CouponRepositoryInterface {
    public function applyCoupon(Request $request)
    {
        if (Cart::content()->count() > 0) {
            $code = $request->code;
            $subtotal = $request->subtotal;
            $coupon = Coupon::where('code', $code)->first();
            if (!$coupon) {
                return response(['message' => 'Coupon is Invalid'], 422);
            }
            if ($coupon->quantity <= 0) {
                return response(['message' => 'All of this Coupon quantity redeemed'], 422);
            }
            if ($coupon->expire_date < now()) {
                return response(['message' => 'Coupon Expired'], 422);
            }
            if ($coupon->discount_type === 'percent') {
                $discount = number_format($subtotal * $coupon->discount / 100, 2);
            } elseif ($coupon->discount_type === 'amount') {
                $discount = number_format($coupon->discount, 2);
            }

            $finalTotal = $subtotal - $discount;

            session()->put('coupon', ['code' => $code, 'discount' => $discount]);

            return response(['status' => 'success', 'message' => 'Coupon Applied Successfully', 'discount' => $discount ?? 0, 'finalTotal' => $finalTotal, 'coupon_code' => $code]);
        } else {
            return response(['status' => 'error', 'message' => 'Please Add Any Product to Cart To Apply Coupon'], 422);
        }
    }

    public function removeCoupon()
    {
        try {
            session()->forget('coupon');
            return response([
                'status' => 'success',
                'message' => 'Coupon Removed!',
                'discount' => 0,
                'total' => cartTotal()
            ]);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
