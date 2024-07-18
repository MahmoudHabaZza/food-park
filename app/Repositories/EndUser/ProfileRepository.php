<?php

namespace App\Repositories\EndUser;

use App\Http\Requests\Admin\ProfileUpdatePasswordRequest;
use App\Http\Requests\EndUser\ProfileUpdateRequest;
use App\Interfaces\EndUser\ProfileRepositoryInterface;
use App\Traits\UploadFileTrait;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProfileRepository implements ProfileRepositoryInterface {

    use UploadFileTrait;

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

public function updateAvatar(Request $request)
{
    try{
        $image_path =   $this->uploadImage($request , 'avatar' , 'uploads');
        $user = Auth::user();
        $user->update([
            'avatar' => $image_path,
        ]);

        return response(['status' => 'success' , 'message' => 'Avatar Updated Successfully']);
    }catch(\Exception $e){
        return response(['status' => 'error' , 'message' => $e->getMessage()]);
    }

}

}
