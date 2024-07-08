<?php

namespace App\Repositories\Admin;

use App\DataTables\ChefDataTable;
use App\Http\Requests\ChefCreateRequest;
use App\Http\Requests\ChefUpdateRequest;
use App\Interfaces\Admin\ChefRepositoryInterface;
use App\Models\Chef;
use App\Models\SectionTitle;
use App\Traits\UploadFileTrait;
use Illuminate\Http\Request;

class ChefRepository implements ChefRepositoryInterface {
    use UploadFileTrait;
    public function index(ChefDataTable $dataTable)
    {
        $keys = ['chef_top_title', 'chef_main_title', 'chef_sub_title'];
        $titles = SectionTitle::whereIn('key', $keys)->pluck('value', 'key');
        return $dataTable->render('Admin.Chef.index',compact('titles'));
    }
    public function create()
    {
        return view('Admin.Chef.create');
    }
    public function store(ChefCreateRequest $request)
    {
        $imagePath = $this->uploadImage($request,'image');
        Chef::create([
            'image' => $imagePath,
            'name' => $request->name,
            'title' => $request->title,
            'fb' => $request->fb,
            'in' => $request->in,
            'x' => $request->x,
            'show_at_home' => $request->show_at_home,
            'status' => $request->status,
        ]);

        toastr()->success('Chef Created Successfully');
        return to_route('admin.chef.index');
    }
    public function edit(string $id)
    {
        $chef = Chef::findOrFail($id);
        return view('Admin.Chef.edit',compact('chef'));
    }
    public function update(ChefUpdateRequest $request, string $id)
    {
        $chef = Chef::findOrFail($id);
        $imagePath = $this->uploadImage($request, 'image','uploads',$chef->image);
        $chef->update([
            'image' => !empty($imagePath) ? $imagePath : $chef->image,
            'name' => $request->name,
            'title' => $request->title,
            'fb' => $request->fb,
            'in' => $request->in,
            'x' => $request->x,
            'show_at_home' => $request->show_at_home,
            'status' => $request->status,
        ]);

        toastr()->success('Chef Updated Successfully');
        return to_route('admin.chef.index');
    }
    public function updateTitle(Request $request)
    {
        $request->validate([
            'chef_top_title' => ['required', 'max:100'],
            'chef_main_title' => ['required', 'max:200'],
            'chef_sub_title' => ['required', 'max:500'],
        ]);

        SectionTitle::updateOrCreate(
            ['key' => 'chef_top_title'],
            ['value' => $request->chef_top_title],
        );
        SectionTitle::updateOrCreate(
            ['key' => 'chef_main_title'],
            ['value' => $request->chef_main_title],

        );
        SectionTitle::updateOrCreate(
            ['key' => 'chef_sub_title'],
            ['value' => $request->chef_sub_title],

        );
        toastr()->success('Updated Successfully');
        return redirect()->back();
    }
    public function destroy(string $id)
    {
        $chef = Chef::findOrFail($id);

        try {
            $this->removeImage($chef->image);
            $chef->delete();
            return response(['status' => 'success', 'message' => 'Chef Deleted Successfully']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Something Went Wrong!']);
        }
    }
}
