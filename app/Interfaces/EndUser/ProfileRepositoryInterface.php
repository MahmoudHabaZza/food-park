<?php

namespace App\Interfaces\EndUser;

use App\Http\Requests\Admin\ProfileUpdatePasswordRequest;
use App\Http\Requests\EndUser\ProfileUpdateRequest;

interface ProfileRepositoryInterface {

    public function updateProfile(ProfileUpdateRequest $request);
    public function updatePassword(ProfileUpdatePasswordRequest $request);
}
