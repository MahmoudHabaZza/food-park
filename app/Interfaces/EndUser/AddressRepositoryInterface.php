<?php

namespace App\Interfaces\EndUser;

use App\Http\Requests\EndUser\AddressCreateRequest;

interface AddressRepositoryInterface {
    public function store(AddressCreateRequest $request);
}
