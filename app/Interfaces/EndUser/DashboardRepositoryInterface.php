<?php

namespace App\Interfaces\EndUser;

use Illuminate\Http\Request;

interface DashboardRepositoryInterface {
    public function index(Request $request);
}
