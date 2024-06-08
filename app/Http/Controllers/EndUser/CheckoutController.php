<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Interfaces\EndUser\CheckoutRepositoryInterface;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    private $checkoutRepository;
    public function __construct(CheckoutRepositoryInterface $checkoutRepository)
    {
        $this->checkoutRepository = $checkoutRepository;
    }
    public function index() {
        return $this->checkoutRepository->index();
    }
    public function deliveryCalculation(Request $request) {
        return $this->checkoutRepository->deliveryCalculation($request);
    }
    public function checkoutRedirect(Request $request){
        return $this->checkoutRepository->checkoutRedirect($request);
    }
}
