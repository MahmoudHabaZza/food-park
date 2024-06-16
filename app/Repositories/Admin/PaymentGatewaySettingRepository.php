<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\PaymentGatewaySettingRepositoryInterface;
use App\Models\PaymentGatewaySetting;
use App\Services\PaymentGatewaySettingService;
use App\Traits\UploadFileTrait;
use Illuminate\Http\Request;
use Illuminate\View\View;
use stdClass;

class PaymentGatewaySettingRepository implements PaymentGatewaySettingRepositoryInterface
{
    use UploadFileTrait;
    public function index(): View
    {
        $paymentSetting = (object) PaymentGatewaySetting::all()->groupBy('key')->toArray();

        return view('Admin.Payment-Gateways.index', compact('paymentSetting'));
    }
    public function paypalSettingsUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'paypal_status' => ['required', 'boolean'],
            'paypal_account_mode' => ['required', 'in:sandbox,live'],
            'paypal_country' => ['required', 'string'],
            'paypal_account_currency' => ['required', 'string'],
            'paypal_currency_rate' => ['required', 'numeric'],
            'paypal_api_key' => ['required'],
            'paypal_secret_key' => ['required'],
        ]);

        if ($request->hasFile('paypal_image')) {
            $request->validate([
                'paypal_image' => ['nullable', 'image']
            ]);

            $imagePath = $this->uploadImage($request, 'paypal_image','uploads/Admin/Payment-Gateway-Logos');
            PaymentGatewaySetting::updateOrCreate(
                ['key' => 'paypal_image'],
                ['value' => $imagePath]
            );
        }



        foreach ($validatedData as $key => $value) {
            PaymentGatewaySetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $paymentGatewaySettingService = app(PaymentGatewaySettingService::class);
        $paymentGatewaySettingService->clearCachedSettings();

        toastr()->success('Updated Successfully');
        return redirect()->back();
    }
}
