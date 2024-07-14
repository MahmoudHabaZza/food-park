<?php

namespace App\Interfaces\Admin;

use App\Http\Requests\AboutUpdateRequest;

interface AboutRepositoryInterface
{
    public function index();
    public function update(AboutUpdateRequest $request);
}
