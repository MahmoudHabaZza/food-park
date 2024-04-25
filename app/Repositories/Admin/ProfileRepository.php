<?php

namespace App\Repositories\Admin;

use App\Http\Requests\Admin\ProfileUpdatePasswordRequest;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Interfaces\Admin\ProfileRepositoryInterface;
use App\Traits\UploadFileTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ProfileRepository implements ProfileRepositoryInterface {

    use UploadFileTrait;

    public function index() : View {
        return view('Admin.Profile.index');
    }

    public function updateProfile(ProfileUpdateRequest $request) : RedirectResponse {

        $user = Auth::user();
        $imagePath = $this->uploadImage($request,'avatar','uploads/Admin/ProfileImages');

        $user->update([
            'avatar' => isset($imagePath) ? $imagePath : $user->avatar,
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // $user->avatar = isset($imagePath) ? $imagePath : $user->avatar;
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->save();


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
