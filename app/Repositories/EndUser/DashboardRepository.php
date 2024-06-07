<?php

namespace App\Repositories\EndUser;

use App\Interfaces\EndUser\DashboardRepositoryInterface;
use App\Models\DeliveryArea;
use Illuminate\View\View;

class DashboardRepository implements DashboardRepositoryInterface {
    public function index()
    {
        $supportedAreas = DeliveryArea::where('status',1)->get();
        return view('EndUser.Dashboard.index',compact('supportedAreas'));
    }
}
