<?php

namespace App\Interfaces\EndUser;

use Illuminate\Http\Request;

interface HomeRepositoryInterface
{
    public function index();
    public function showProduct(string $slug);
    public function loadProductModal($productId);
    public function applyCoupon(Request $request);
    public function removeCoupon();
    public function chef();
    public function testimonials();
    public function about();
    public function contact();
    public function blogs(Request $request);
    public function blogDetails(string $slug);
    public function blogCommentStore(Request $request,string $blogId);
}
