<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileUpdatePasswordRequest;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Interfaces\Admin\ProfileRepositoryInterface;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    private $profileRepository;

    public function __construct(ProfileRepositoryInterface $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }
    //
    public function index() {
        return $this->profileRepository->index();
    }

    public function updateProfile(ProfileUpdateRequest $request) {
        return $this->profileRepository->updateProfile($request);
    }

    public function updatePassword(ProfileUpdatePasswordRequest $request) {
        return $this->profileRepository->updatePassword($request);
    }



}
