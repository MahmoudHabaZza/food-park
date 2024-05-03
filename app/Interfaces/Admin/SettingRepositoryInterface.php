<?php

namespace App\Interfaces\Admin;

use Illuminate\Http\Request;

interface SettingRepositoryInterface
{
    public function index();
    public function updateGeneralSettings(Request $request);
}
