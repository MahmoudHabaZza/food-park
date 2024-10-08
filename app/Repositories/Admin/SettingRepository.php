<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\SettingRepositoryInterface;
use App\Models\Setting;
use App\Services\SettingsService;
use Cache;
use App\Traits\UploadFileTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingRepository implements SettingRepositoryInterface
{
    use UploadFileTrait;
    public function index(): View
    {
        return view('Admin.Setting.index');
    }
    public function updateGeneralSettings(Request $request): RedirectResponse
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
    public function updatePusherSettings(Request $request)
    {
        $validatedData = $request->validate([
            'pusher_app_id' => ['required'],
            'pusher_key' => ['required'],
            'pusher_secret_key' => ['required'],
            'pusher_cluster' => ['required'],
        ]);

        foreach ($validatedData as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value],
            );
        }

        $settingsService = app(SettingsService::class);
        $settingsService->clearCachedSettings();

        toastr()->success('Pusher Settings Uptaded Successfully');
        return redirect()->back();
    }
    public function updateLogoSettings(Request $request)
    {
        $validatedData = $request->validate([
            'logo' => ['nullable','image','max:3000'],
            'favicon' => ['nullable','image','max:3000'],
            'breadcrumb' => ['nullable','image','max:3000'],
            'footer_logo' => ['nullable','image','max:3000'],
        ]);

        foreach($validatedData as $key => $value)
        {
            $imagePath = $this->uploadImage($request,$key);
            if(!empty($imagePath)){
                $oldPath = config('settings.'.$key);
                $this->removeImage($oldPath);
                Setting::updateOrCreate(
                    ['key' => $key],
                    ['value' => $imagePath],
                );
            }
        }

        $settingsService = app(SettingsService::class);
        $settingsService->clearCachedSettings();

        toastr()->success('Logo Settings Updated Successfully');
        return redirect()->back();

    }
    public function updateMailSettings(Request $request)
    {
        $validatedData = $request->validate([
            'mail_driver' => ['required', 'max:50'],
            'mail_host' => ['required',],
            'mail_port' => ['required', 'numeric', 'max_digits:10'],
            'mail_username' => ['required'],
            'mail_password' => ['required'],
            'mail_encryption' => ['required'],
            'mail_form_address' => ['required', 'email'],
            'mail_receiver_address' => ['required', 'email'],
        ]);

        foreach ($validatedData as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value],
            );
        }

        $settingsService = app(SettingsService::class);
        $settingsService->clearCachedSettings();
        Cache::forget('mail-settings');

        toastr()->success('Mail Settings Updated Successfully');
        return redirect()->back();
    }
    public function updateAppearanceSettings(Request $request)
    {
        $request->validate([
            'color' => ['required','max:10'],
        ]);

        Setting::updateOrCreate(
            ['key' => 'color'],
            ['value' => $request->color],
        );

        $settingsService = app(SettingsService::class);
        $settingsService->clearCachedSettings();

        toastr()->success('Appearance Updated Successfully');
        return redirect()->back();
    }
    public function updateSeoSettings(Request $request)
    {
        $validatedData = $request->validate([
            'seo_title' => ['required','max:255'],
            'seo_description' => ['nullable','max:500'],
            'seo_keywords' => ['nullable']
        ]);

        foreach ($validatedData as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value],
            );
        }

        $settingsService = app(SettingsService::class);
        $settingsService->clearCachedSettings();

        toastr()->success('SEO Settings updated Successfully');
        return redirect()->back();
    }
}
