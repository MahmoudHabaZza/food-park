<?php
namespace App\Repositories\Admin;

use App\Http\Requests\FooterInfoUpdateRequest;
use App\Interfaces\Admin\FooterInfoRepositoryInterface;
use App\Models\FooterInfo;

class FooterInfoRepository implements FooterInfoRepositoryInterface {
    public function index()
    {
        $footer_info = FooterInfo::first();
        return view('Admin.Footer.index',compact('footer_info'));
    }
    public function update(FooterInfoUpdateRequest $request)
    {
        FooterInfo::updateOrCreate(
            ['id' => 1],
            [
                'short_description' => $request->short_description,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'copyright' => $request->copyright,
            ]
            );

        toastr()->success('Footer Info Updated Successfully');
        return redirect()->back();
    }
}
