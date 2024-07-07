<?php

namespace App\Repositories\EndUser;

use App\Interfaces\EndUser\HomeRepositoryInterface;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\DailyOffer;
use App\Models\Product;
use App\Models\SectionTitle;
use App\Models\Slider;
use App\Models\WhyChooseUs;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class HomeRepository implements HomeRepositoryInterface
{
    public function index(): View
    {
        $sliders = Slider::where('status', 1)->get();
        $why_choose_us = WhyChooseUs::where('status', 1)->get();
        $sectionTitles = $this->getSectionTitles();
        $sections = WhyChooseUs::where('status', 1)->get();
        $categories = Category::where(['show_at_home' => 1, 'status' => 1])->get();
        $dailyOffers = DailyOffer::with('product')->where('status',1)->take(15)->get();
        return view('EndUser.Home.index', compact('sliders', 'why_choose_us', 'sectionTitles', 'sections', 'categories','dailyOffers'));
    }

    public function getSectionTitles(): Collection
    {
        $keys = [
            'why_choose_top_title',
            'why_choose_main_title',
            'why_choose_sub_title',
            'daily_offer_top_title',
            'daily_offer_main_title',
            'daily_offer_sub_title'
        ];
        return SectionTitle::whereIn('key', $keys)->pluck('value', 'key');
    }

    public function showProduct(string $slug): View
    {
        $product = Product::with(['images', 'sizes', 'options'])->where(['slug' => $slug, 'status' => 1])->firstOrFail();
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)->take(8)->latest()->get();


        return view('EndUser.Pages.produc-view', compact('product', 'relatedProducts'));
    }
    public function loadProductModal($productId)
    {
        $product = Product::with(['sizes', 'options'])->findOrFail($productId);
        return view('EndUser.Pages.ajax-files.product-load-modal',compact('product'))->render();
        // render() => to ensure that we have html response
    }

    public function applyCoupon(Request $request)
    {
        if(Cart::content()->count() > 0) {
            $code = $request->code;
            $subtotal = $request->subtotal;
            $coupon = Coupon::where('code',$code)->first();
            if(!$coupon) {
                return response(['message'=> 'Coupon is Invalid'],422);
            }
            if($coupon->quantity <= 0) {
                return response(['message' => 'All of this Coupon quantity redeemed'],422);
            }
            if($coupon->expire_date < now()){
                return response(['message' => 'Coupon Expired'],422);
            }
            if($coupon->discount_type === 'percent') {
                $discount = number_format($subtotal * $coupon->discount / 100,2);
            }elseif($coupon->discount_type === 'amount') {
                $discount = number_format($coupon->discount,2);
            }

            $finalTotal = $subtotal - $discount;

            session()->put('coupon',['code'=> $code,'discount'=> $discount]);

            return response(['status'=> 'success','message' => 'Coupon Applied Successfully','discount'=> $discount ?? 0 , 'finalTotal' => $finalTotal , 'coupon_code' => $code]);
        }else {
            return response(['status' => 'error' , 'message' => 'Please Add Any Product to Cart To Apply Coupon'],422);
        }


    }

    public function removeCoupon(){
        try{
            session()->forget('coupon');
        return response([
            'status' => 'success',
            'message' => 'Coupon Removed!',
            'discount' => 0,
            'total' => cartTotal()
            ]);
        } catch(\Exception $e) {
            return response(['status' => 'error' , 'message' => $e->getMessage()]);
        }

    }
}
