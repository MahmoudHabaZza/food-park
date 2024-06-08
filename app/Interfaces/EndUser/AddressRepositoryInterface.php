<?php

namespace App\Interfaces\EndUser;

use App\Http\Requests\EndUser\AddressCreateRequest;
use App\Http\Requests\EndUser\AddressUpdateRequest;

interface AddressRepositoryInterface {
    public function store(AddressCreateRequest $request);
    public function update(AddressUpdateRequest $request,string $id);
    public function destroy(string $id);
}
