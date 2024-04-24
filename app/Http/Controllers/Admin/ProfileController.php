<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function index() : View {
        return view('Admin.Profile.index');
    }

    public function profileUpdate(ProfileUpdateRequest $request) : RedirectResponse {



        return redirect()->back();
    }
}
