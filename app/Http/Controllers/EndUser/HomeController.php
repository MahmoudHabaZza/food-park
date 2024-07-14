<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Interfaces\EndUser\HomeRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //


    private $homeRepository;
    public function __construct(HomeRepositoryInterface $homeRepository)
    {
        $this->homeRepository = $homeRepository;
    }

    public function index()
    {
        return $this->homeRepository->index();
    }

    public function showProduct(string $slug)
    {
        return $this->homeRepository->showProduct($slug);
    }

    public function loadProductModal($productId)
    {
        return $this->homeRepository->loadProductModal($productId);
    }

    public function applyCoupon(Request $request) {
        return $this->homeRepository->applyCoupon($request);
    }
    public function removeCoupon(){
        return $this->homeRepository->removeCoupon();
    }
    public function chef(){
        return $this->homeRepository->chef();
    }
    public function testimonials(){
        return $this->homeRepository->testimonials();
    }
    public function about()
    {
        return $this->homeRepository->about();
    }
    public function blogs(Request $request){
        return $this->homeRepository->blogs($request);
    }
    public function blogDetails($slug){
        return $this->homeRepository->blogDetails($slug);
    }
    public function blogCommentStore(Request $request , string $blogId)
    {
        return $this->homeRepository->blogCommentStore($request, $blogId);
    }
}
