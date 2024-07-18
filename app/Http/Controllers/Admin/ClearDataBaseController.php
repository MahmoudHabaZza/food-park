<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClearDataBaseController extends Controller
{
    function index() {
        return view('Admin.Clear-DataBase.index');
    }
}
