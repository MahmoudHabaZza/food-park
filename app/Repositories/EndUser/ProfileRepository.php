<?php

namespace App\Repositories\EndUser;

use App\Http\Requests\Admin\ProfileUpdatePasswordRequest;
use App\Http\Requests\EndUser\ProfileUpdateRequest;
use App\Interfaces\EndUser\ProfileRepositoryInterface;
use Auth;
use Illuminate\Http\RedirectResponse;

class ProfileRepository implements ProfileRepositoryInterface {

public function updateProfile(ProfileUpdateRequest $request) : RedirectResponse
{
    $user = Auth::user();
    $user->update([
        'name' => $request->name,
        'email' => $request->email
    ]);

    toastr()->success('Profile Information Updated Successfully');
    return redirect()->back();
}

public function updatePassword(ProfileUpdatePasswordRequest $request) : RedirectResponse
{
    $user = Auth::user();
    $user->update(['password'=> bcrypt($request->password)]);
    toastr()->success('Password Updated Successfully');
    return redirect()->back();


}

}
