<?php

namespace App\Services;

use App\Models\PaymentGatewaySetting;
use Cache;

class PaymentGatewaySettingService {
    public function getSettings(){
        return Cache::rememberForever('gatewaySettings',function(){
            return PaymentGatewaySetting::pluck('value','key')->toArray();
        });
    }

    public function setGlobalSettings() {
        $gatewaySettings = $this->getSettings();
        config()->set('gatewaySettings',$gatewaySettings);
    }

    public function clearCachedSettings(){
        Cache::forget('gatewaySettings');
    }
}
