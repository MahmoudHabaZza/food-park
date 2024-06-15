<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Admin\PaymentGatewaySettingRepositoryInterface;
use Illuminate\Http\Request;

class PaymentGatewaySettingController extends Controller
{
    private $paymentGatewayRepository;
    public function __construct(PaymentGatewaySettingRepositoryInterface $paymentGatewayRepository)
    {
        $this->paymentGatewayRepository = $paymentGatewayRepository;
    }
    public function index() {
        return $this->paymentGatewayRepository->index();
    }
    public function paypalSettingsUpdate(Request $request) {
        return $this->paymentGatewayRepository->paypalSettingsUpdate($request);
    }

}
