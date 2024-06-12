<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\PaymentGatewaySettingRepositoryInterface;
use Illuminate\View\View;

class PaymentGatewaySettingRepository implements PaymentGatewaySettingRepositoryInterface {
    public function index() : View
    {
        return view('Admin.Payment-Gateways.index');
    }
}
