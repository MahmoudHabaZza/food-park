<?php

namespace App\Repositories\EndUser;

use App\Interfaces\EndUser\DashboardRepositoryInterface;
use App\Models\Address;
use App\Models\DeliveryArea;
use App\Models\Order;
use App\Models\ProductRating;
use App\Models\Reservation;
use App\Models\WishList;
use Illuminate\View\View;

class DashboardRepository implements DashboardRepositoryInterface {
    public function index()
    {
        $supportedAreas = DeliveryArea::where('status',1)->get();
        $userAddresses = Address::where('user_id',auth()->user()->id)->get();
        $orders = Order::where('user_id',auth()->user()->id)->get();
        $reservations = Reservation::with('reservationTime')->where('user_id',auth()->user()->id)->get();
        $reviews = ProductRating::with('user')->where('user_id',auth()->user()->id)->get();
        $wishlist = WishList::with('product')->where('user_id',auth()->user()->id)->get();
        return view('EndUser.Dashboard.index',compact('supportedAreas','userAddresses','orders','reservations','reviews', 'wishlist'));
    }
}
