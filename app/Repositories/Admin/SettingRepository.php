<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\SettingRepositoryInterface;
use App\Models\Setting;
use App\Services\SettingsService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingRepository implements SettingRepositoryInterface
{
    public function index(): View
    {
        return view('Admin.Setting.index');
    }
    public function updateGeneralSettings(Request $request) : RedirectResponse
    {
        $validatedData = $request->validate([
            'site_name' => ['required', 'max:255'],
            'site_default_currency' => ['required', 'max:4'],
            'site_currency_icon' => ['required', 'max:4'],
            'site_default_currency_position' => ['required', 'max:50'],
        ]);

        foreach ($validatedData as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value],
            );
        }

        $settingsService = app(SettingsService::class);
        $settingsService->clearCachedSettings();

        toastr()->success('Settings Uptaded Successfully');
        return redirect()->back();
    }
}
