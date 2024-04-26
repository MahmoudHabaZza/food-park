<?php

namespace App\Repositories\Admin;

use App\DataTables\SliderDataTable;
use App\Http\Requests\Admin\SliderCreateRequest;
use App\Interfaces\Admin\SliderRepositoryInterface;
use App\Models\Slider;
use App\Traits\UploadFileTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class SliderRepository implements SliderRepositoryInterface {
    use UploadFileTrait;
    public function index(SliderDataTable $dataTable)
    {
        return $dataTable->render('Admin.slider.index');
    }
    public function create() : View
    {
        return view('Admin.Slider.create');
    }
    public function store(SliderCreateRequest $request) : RedirectResponse
    {
        $image_path = $this->uploadImage($request,'image','uploads/Admin/Sliders');

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
}
