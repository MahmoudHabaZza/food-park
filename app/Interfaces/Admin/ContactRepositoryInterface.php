<?php

namespace App\Interfaces\Admin;

use App\Http\Requests\ContactUpdateRequest;

interface ContactRepositoryInterface
{
    public function index();
    public function update(ContactUpdateRequest $request);
}
