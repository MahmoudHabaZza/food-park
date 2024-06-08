<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Requests\EndUser\AddressCreateRequest;
use App\Http\Requests\EndUser\AddressUpdateRequest;
use App\Interfaces\EndUser\AddressRepositoryInterface;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    private $addressRepository;
    public function __construct(AddressRepositoryInterface $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }

    public function store(AddressCreateRequest $request) {
        return $this->addressRepository->store($request);
    }
    public function update(AddressUpdateRequest $request , string $id) {
        return $this->addressRepository->update($request, $id);
    }
    public function destroy(string $id){
        return $this->addressRepository->destroy($id);
    }

}
