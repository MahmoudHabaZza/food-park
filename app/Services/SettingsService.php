<?php

namespace App\Services;

use App\Models\Setting;
use Cache;

class SettingsService
{
    public function getSettings()
    {
        return Cache::rememberForever('settings', function () {
            return Setting::pluck('value', 'key')->toArray(); // it returns collection by default
        });
    }

    public function setGlobalSettings()
    {
        $settings = $this->getSettings();
        config()->set('settings', $settings); // we store our settings globally with config()
    }

    public function clearCachedSettings()
    {
        Cache::forget('settings');
    }
}
