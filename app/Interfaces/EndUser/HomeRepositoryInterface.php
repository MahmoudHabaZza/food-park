<?php

namespace App\Interfaces\EndUser;

use App\Http\Requests\ReservationStoreRequest;
use Illuminate\Http\Request;

interface HomeRepositoryInterface
{
    public function index();
    public function showProduct(string $slug);
    public function loadProductModal($productId);
    public function productReviewStore(Request $request);
    public function applyCoupon(Request $request);
    public function removeCoupon();
    public function chef();
    public function testimonials();
    public function about();
    public function contact();
    public function sendMessage(Request $request);
    public function reservation(ReservationStoreRequest $request);
    public function subscribeNewsLetter(Request $request);
    public function blogs(Request $request);
    public function blogDetails(string $slug);
    public function blogCommentStore(Request $request,string $blogId);
}
