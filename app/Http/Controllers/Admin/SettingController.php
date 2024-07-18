<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Admin\SettingRepositoryInterface;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    private $settingRepository;
    public function __construct(SettingRepositoryInterface $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }
    public function index()
    {
        return $this->settingRepository->index();
    }
    public function updateGeneralSettings(Request $request) {
        return $this->settingRepository->updateGeneralSettings($request);
    }
    public function updatePusherSettings(Request $request){
        return $this->settingRepository->updatePusherSettings($request);
    }
    public function updateLogoSettings(Request $request)
    {
        return $this->settingRepository->updateLogoSettings($request);
    }
    public function updateMailSettings(Request $request){
        return $this->settingRepository->updateMailSettings($request);
    }
    public function updateAppearanceSettings(Request $request)
    {
        return $this->settingRepository->updateAppearanceSettings($request);
    }

    public function updateSeoSettings(Request $request)
    {
        return $this->settingRepository->updateSeoSettings($request);
    }

}
