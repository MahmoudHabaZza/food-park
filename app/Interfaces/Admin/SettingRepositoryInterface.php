<?php

namespace App\Interfaces\Admin;

use Illuminate\Http\Request;

interface SettingRepositoryInterface
{
    public function index();
    public function updateGeneralSettings(Request $request);
    public function updatePusherSettings(Request $request);
    public function updateLogoSettings(Request $request);
    public function updateMailSettings(Request $request);
    public function updateAppearanceSettings(Request $request);


}
