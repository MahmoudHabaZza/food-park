<?php

namespace App\Interfaces\Admin;

use App\Http\Requests\FooterInfoUpdateRequest;

interface FooterInfoRepositoryInterface
{

    public function index();
    public function update(FooterInfoUpdateRequest $request);

}
