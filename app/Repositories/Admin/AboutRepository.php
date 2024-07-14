<?php

namespace App\Repositories\Admin;

use App\Http\Requests\AboutUpdateRequest;
use App\Interfaces\Admin\AboutRepositoryInterface;
use App\Models\About;
use App\Traits\UploadFileTrait;

class AboutRepository implements AboutRepositoryInterface
{
    use UploadFileTrait;
    public function index()
    {
        $about = About::first();
        return view('Admin.About.index',compact('about'));
    }
    public function update(AboutUpdateRequest $request)
    {
        $imagePath = $this->uploadImage($request,'image','uploads',$request->old_image);
        About::updateOrCreate(
            ['id' => 1],
            [
                'image' => !empty($imagePath) ? $imagePath : $request->old_image,
                'main_title' => $request->main_title,
                'title' => $request->title,
                'description' => $request->description,
                'video_link' => $request->video_link,

            ]
            );

        toastr()->success('About Information Updated Successfully');
        return redirect()->back();
    }
}
