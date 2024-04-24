<?php

namespace App\Interfaces\Admin;

use App\Http\Requests\Admin\ProfileUpdatePasswordRequest;
use App\Http\Requests\Admin\ProfileUpdateRequest;

interface ProfileRepositoryInterface {
    public function index();
    public function updateProfile(ProfileUpdateRequest $request);
    public function updatePassword(ProfileUpdatePasswordRequest $request);

};
