<?php

namespace App\Interfaces\Admin;

use Illuminate\Http\Request;

interface PaymentGatewaySettingRepositoryInterface {
    public function index();
    public function paypalSettingsUpdate(Request $request);
}
