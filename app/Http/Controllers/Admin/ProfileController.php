<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function index() : View {
        return view('Admin.Profile.index');
    }

    
    public function profileUpdate(ProfileUpdateRequest $request) : RedirectResponse {

        $user = Auth::user();
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);


        toastr()->success('Data Updated Successfully');
        return redirect()->back();
    }
}
