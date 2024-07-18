<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class ClearDataBaseController extends Controller
{
    public function index() {
        return view('Admin.Clear-DataBase.index');
    }
    public function clearDatabase() {
        try
        {
            Artisan::call('migrate:fresh');
            Artisan::call('db:seed',['--class'=> 'MenuBuilderSeeder']);
            Artisan::call('db:seed',['--class'=> 'PaymentGatewaySettingSeeder']);
            Artisan::call('db:seed',['--class'=> 'SectionTitleSeeder']);
            Artisan::call('db:seed',['--class'=> 'SettingSeeder']);
            Artisan::call('db:seed',['--class'=> 'UserSeeder']);

            $this->deleteFiles();
            return response(['status' => 'success','message' => 'Database is successfully cleared']);


        }catch(\Exception $e)
        {
            throw $e;
        }
    }

    public function deleteFiles()
    {
        $path = public_path('uploads');
        $allFiles = File::allFiles($path);
        foreach ($allFiles as $file) {
            File::delete($file);
        }
    }

}
