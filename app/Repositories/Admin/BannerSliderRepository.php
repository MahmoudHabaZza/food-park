<?php

namespace App\Repositories\Admin;

use App\DataTables\BannerSliderDataTable;
use App\Http\Requests\BannerSliderCreateRequest;
use App\Http\Requests\BannerSliderUpdateRequest;
use App\Interfaces\Admin\BannerSliderRepositoryInterface;
use App\Models\BannerSlider;
use App\Traits\UploadFileTrait;

class BannerSliderRepository implements BannerSliderRepositoryInterface {
    use UploadFileTrait;
    public function index(BannerSliderDataTable $dataTable)
    {
        return $dataTable->render('Admin.Banner-Slider.index');
    }
    public function create()
    {
        return view('Admin.Banner-Slider.create');
    }
    public function store(BannerSliderCreateRequest $request)
    {

        $imagePath = $this->uploadImage($request,'banner','uploads');
        BannerSlider::create([
            'banner' => $imagePath,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'url' => $request->url,
            'status' => $request->status,
        ]);

        toastr()->success('Banner Slider Created Successfully');
        return to_route('admin.banner-slider.index');
    }
    public function edit(string $id)
    {
        $bannerSlider = BannerSlider::findOrFail($id);
        return view('Admin.Banner-Slider.edit',compact('bannerSlider'));
    }
    public function update(BannerSliderUpdateRequest $request, string $id)
    {
        $bannerSlider= BannerSlider::findOrFail($id);
        $imagePath = $this->uploadImage($request,'banner','uploads',$request->old_banner);
        $bannerSlider->update([
            'banner' => !empty($imagePath) ? $imagePath : $request->old_banner,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'url' => $request->url,
            'status' => $request->status,
        ]);

        toastr()->success('Banner Slider Updated Successfully');
        return to_route('admin.banner-slider.index');
    }

    public function destroy(string $id) {
        $bannerSlider = BannerSlider::findOrFail($id);

        try {
            $this->removeImage($bannerSlider->banner);
            $bannerSlider->delete();
            return response(['status' => 'success', 'message' => 'Banner Slider Deleted Successfully']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Something Went Wrong!']);
        }
    }
}
