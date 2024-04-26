<?php

namespace App\Repositories\Admin;

use App\DataTables\SliderDataTable;
use App\Http\Requests\Admin\SliderCreateRequest;
use App\Http\Requests\Admin\SliderUpdateRequest;
use App\Interfaces\Admin\SliderRepositoryInterface;
use App\Models\Slider;
use App\Traits\UploadFileTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderRepository implements SliderRepositoryInterface
{
    use UploadFileTrait;
    public function index(SliderDataTable $dataTable)
    {
        return $dataTable->render('Admin.slider.index');
    }
    public function create(): View
    {
        return view('Admin.Slider.create');
    }
    public function store(SliderCreateRequest $request): RedirectResponse
    {
        $image_path = $this->uploadImage($request, 'image', 'uploads/Admin/Sliders');

        Slider::create([
            'image' => $image_path,
            'offer' => $request->offer,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'btn_link' => $request->btn_link,
            'status' => $request->status
        ]);

        toastr()->success('Slider Created Successfully');
        return to_route('admin.Slider.index');
    }
    public function edit(string $id): View
    {
        $slider = Slider::findOrFail($id);
        return view('Admin.Slider.edit', compact('slider'));
    }
    public function update(SliderUpdateRequest $request, string $id): RedirectResponse
    {
        $slider = Slider::findOrFail($id);

        $image_path = $this->uploadImage($request, 'image', 'uploads/Admin/Sliders', $slider->image);

        $slider->update([
            'image' => !empty($image_path) ? $image_path : $slider->image,
            'offer' => $request->offer,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'status' => $request->status,
            'btn_link' => $request->btn_link
        ]);

        toastr()->success('Slider Updated Successfully');
        return to_route('admin.Slider.index');
    }
    public function destroy(string $id)
    {

        try {
            $slider = Slider::findOrFail($id);
            File::delete(public_path($slider->image));
            $slider->delete();
            return response(['status' => 'success','message' => 'Deleted Successfully']);
        } catch (\Exception $e) {
            return response(['status' => 'error','message' => 'There is An Error']);
        }
    }
}
