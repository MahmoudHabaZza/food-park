<?php

namespace App\Interfaces\EndUser;

use App\Http\Requests\ReservationStoreRequest;
use Illuminate\Http\Request;

interface HomeRepositoryInterface
{
    public function index();
    public function chef();
    public function testimonials();
    public function about();
    public function contact();
    public function sendMessage(Request $request);
    public function reservation(ReservationStoreRequest $request);
    public function subscribeNewsLetter(Request $request);
}
