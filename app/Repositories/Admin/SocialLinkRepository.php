<?php
namespace App\Repositories\Admin;

use App\DataTables\SocialLinkDataTable;
use App\Http\Requests\SocialLinkCreateRequest;
use App\Interfaces\Admin\SocialLinkRepositoryInterface;
use App\Models\SocialLink;

class SocialLinkRepository implements SocialLinkRepositoryInterface {
    public function index(SocialLinkDataTable $dataTable)
    {
        return $dataTable->render('Admin.Social-Link.index');
    }
    public function create()
    {
        return view('Admin.Social-Link.create');
    }
    public function store(SocialLinkCreateRequest $request)
    {
        SocialLink::create([
            'name' => $request->name,
            'icon' => $request->icon,
            'link' => $request->link,
            'status' => $request->status,
        ]);

        toastr()->success('Social Link created successfully');
        return to_route('admin.social-links.index');
    }
    public function edit(string $id)
    {
        $social_link = SocialLink::findOrFail($id);
        return view('Admin.Social-Link.edit', compact('social_link'));
    }
    public function update(SocialLinkCreateRequest $request, string $id)
    {
        $social_link = SocialLink::findOrFail($id);
        $social_link->update([
            'icon' => $request->icon,
            'name' => $request->name,
            'link' => $request->link,
            'status' => $request->status,
        ]);

        toastr()->success('Social Link Updated Successfully');
        return to_route('admin.social-links.index');

    }
    public function destroy(string $id)
    {
        try {
            $social_link = SocialLink::findOrFail($id);
            $social_link->delete();
            return response(['status' => 'success','message' => 'Successfully deleted']);
        }catch(\Exception $e){
            return response(['status' => 'error','message' => 'Something went wrong!']);
        }
    }
}
