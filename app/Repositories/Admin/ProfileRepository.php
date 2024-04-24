<?php

namespace App\Repositories\Admin;

use App\Http\Requests\Admin\ProfileUpdatePasswordRequest;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Interfaces\Admin\ProfileRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ProfileRepository implements ProfileRepositoryInterface {

    public function index() : View {
        return view('Admin.Profile.index');
    }

    public function updateProfile(ProfileUpdateRequest $request) : RedirectResponse {

        $user = Auth::user();
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);


        toastr()->success('Data Updated Successfully');
        return redirect()->back();
    }

    public function updatePassword(ProfileUpdatePasswordRequest $request) : RedirectResponse
    {
        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();

        toastr()->success('Password Updated Successfully');
        return redirect()->back();

    }
}
