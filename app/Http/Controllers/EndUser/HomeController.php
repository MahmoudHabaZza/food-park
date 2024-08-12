<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
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

    public function contact()
    {
        return $this->homeRepository->contact();
    }

    public function sendMessage(Request $request)
    {
        return $this->homeRepository->sendMessage($request);
    }
    public function reservation(ReservationStoreRequest $request)
    {
        return $this->homeRepository->reservation($request);
    }
    public function subscribeNewsLetter(Request $request)
    {
        return $this->homeRepository->subscribeNewsLetter($request);
    }
}
