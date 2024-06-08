<?php

namespace App\Repositories\EndUser;

use App\Http\Requests\EndUser\AddressCreateRequest;
use App\Http\Requests\EndUser\AddressUpdateRequest;
use App\Interfaces\EndUser\AddressRepositoryInterface;
use App\Models\Address;

class AddressRepository implements AddressRepositoryInterface {
    public function store(AddressCreateRequest $request)
    {
        Address::create([
            'delivery_area_id' => $request->delivery_area_id,
            'user_id' => auth()->user()->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'type' => $request->type

        ]);

        toastr()->success('Address Added Successfully');
        return to_route('dashboard');
    }

    public function update(AddressUpdateRequest $request, string $id)
    {
        $address = Address::findOrFail($id);
        $address->update([
            'delivery_area_id' => $request->delivery_area_id,
            'user_id' => auth()->user()->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'type' => $request->type
        ]);
        toastr()->success('Address Updated Successfully');
        return to_route('dashboard');
    }
}
