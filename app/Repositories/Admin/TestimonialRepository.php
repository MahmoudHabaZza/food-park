<?php

namespace App\Repositories\Admin;

use App\DataTables\TestimonialDataTable;
use App\Http\Requests\TestimonialCreateRequest;
use App\Http\Requests\TestimonialUpdateRequest;
use App\Interfaces\Admin\TestimonialRepositoryInterface;
use App\Models\SectionTitle;
use App\Models\Testimonial;
use App\Traits\UploadFileTrait;
use Illuminate\Http\Request;

class TestimonialRepository implements TestimonialRepositoryInterface {
    use UploadFileTrait;
    public function index(TestimonialDataTable $dataTable)
    {
        $keys = ['testimonial_top_title', 'testimonial_main_title', 'testimonial_sub_title'];
        $titles = SectionTitle::whereIn('key', $keys)->pluck('value', 'key');
        return $dataTable->render('Admin.Testimonial.index',compact('titles'));

    }
    public function updateTitle(Request $request)
    {
        $request->validate([
            'testimonial_top_title' => ['required', 'max:100'],
            'testimonial_main_title' => ['required', 'max:200'],
            'testimonial_sub_title' => ['required', 'max:500'],
        ]);

        SectionTitle::updateOrCreate(
            ['key' => 'testimonial_top_title'],
            ['value' => $request->testimonial_top_title],
        );
        SectionTitle::updateOrCreate(
            ['key' => 'testimonial_main_title'],
            ['value' => $request->testimonial_main_title],

        );
        SectionTitle::updateOrCreate(
            ['key' => 'testimonial_sub_title'],
            ['value' => $request->testimonial_sub_title],

        );
        toastr()->success('Updated Successfully');
        return redirect()->back();
    }
    public function create()
    {
        return view('Admin.Testimonial.create');
    }


    public function store(TestimonialCreateRequest $request)
    {

        $imagePath = $this->uploadImage($request,'image');
        Testimonial::create([
            'name' => $request->name,
            'image' => $imagePath,
            'rating' => $request->rating,
            'review' => $request->review,
            'status' => $request->status,
            'show_at_home' => $request->show_at_home
        ]);

        toastr()->success('Testimonial Created Successfully');
        return redirect()->route('admin.testimonial.index');
    }

    public function edit(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('Admin.Testimonial.edit', compact('testimonial'));
    }

    public function update(TestimonialUpdateRequest $request, string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $imagePath = $this->uploadImage($request,'image','uploads' , $request->old_image);
        $testimonial->update([
            'name' => $request->name,
            'image' =>!empty($imagePath)? $imagePath : $request->old_image,
            'rating' => $request->rating,
           'review' => $request->review,
           'status' => $request->status,
           'show_at_home' => $request->show_at_home
        ]);

        toastr()->success('Testimonial Updated Successfully');
        return redirect()->route('admin.testimonial.index');
    }

    public function destroy(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        try {
            $this->removeImage($testimonial->image);
            $testimonial->delete();
            return response(['status' => 'success', 'message' => 'Testimonial Deleted Successfully']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Something Went Wrong!']);
        }
    }
}
