<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\SettingsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class ClearDataBaseController extends Controller
{
    public function index()
    {
        return view('Admin.Clear-DataBase.index');
    }
    public function clearDatabase()
    {
        try {
            Artisan::call('migrate:fresh');
            Artisan::call('db:seed', ['--class' => 'MenuBuilderSeeder']);
            Artisan::call('db:seed', ['--class' => 'PaymentGatewaySettingSeeder']);
            Artisan::call('db:seed', ['--class' => 'SectionTitleSeeder']);
            Artisan::call('db:seed', ['--class' => 'SettingSeeder']);
            Artisan::call('db:seed', ['--class' => 'UserSeeder']);

            $this->deleteFiles();
            $settingService = app(SettingsService::class);
            $settingService->clearCachedSettings();
            return response(['status' => 'success', 'message' => 'Database is successfully cleared']);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function deleteFiles()
    {
        $path = public_path('uploads');
        $allFiles = File::allFiles($path);
        foreach ($allFiles as $file) {
            if (!str_contains($file->getPathname(), 'uploads\Default')) {
                File::delete($file);
            }
        }
    }
}
