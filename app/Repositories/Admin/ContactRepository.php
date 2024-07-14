<?php

namespace App\Repositories\Admin;

use App\Http\Requests\ContactUpdateRequest;
use App\Interfaces\Admin\ContactRepositoryInterface;
use App\Models\Contact;

class ContactRepository implements ContactRepositoryInterface
{
    public function index()
    {
        $contact = Contact::first();
        return view('Admin.Contact.index',compact('contact'));
    }
    public function update(ContactUpdateRequest $request)
    {
        Contact::updateOrCreate(
            ['id' => 1],
            [
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'mail_one' => $request->mail_one,
                'mail_two' => $request->mail_two,
                'address' => $request->address,
                'map_link' => $request->map_link,
            ]
        );

        toastr()->success('Contact Info Updated Successfully');
        return redirect()->back();
    }
}
