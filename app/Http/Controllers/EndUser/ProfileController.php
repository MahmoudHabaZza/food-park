<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileUpdatePasswordRequest;
use App\Http\Requests\EndUser\ProfileUpdateRequest;
use App\Interfaces\EndUser\ProfileRepositoryInterface;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //

    private $profileRepository;

    public function __construct(ProfileRepositoryInterface $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    public function updateProfile(ProfileUpdateRequest $request) {
        return $this->profileRepository->updateProfile($request);
    }

    public function updatePassword(ProfileUpdatePasswordRequest $request) {
        return $this->profileRepository->updatePassword($request);
    }

    public function updateAvatar(Request $request) {
        return $this->profileRepository->updateAvatar($request);
    }
}
