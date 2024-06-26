<?php

namespace App\Repositories\Admin;

use App\DataTables\WhyChooseUsDataTable;
use App\Http\Requests\WhyChooseUsCreateRequest;
use App\Interfaces\Admin\WhyChooseUsRepositoryInterface;
use App\Models\SectionTitle;
use App\Models\WhyChooseUs;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class WhyChooseUsRepository implements WhyChooseUsRepositoryInterface
{
    public function index(WhyChooseUsDataTable $datatable)
    {
        $keys = ['why_choose_top_title', 'why_choose_main_title', 'why_choose_sub_title'];
        $titles = SectionTitle::whereIn('key', $keys)->pluck('value', 'key');
        return $datatable->render('admin.WhyChooseUs.index', compact('titles'));
    }
    public function create(): View
    {
        return view('Admin.WhyChooseUs.create');
    }
    public function store(WhyChooseUsCreateRequest $request): RedirectResponse
    {
        WhyChooseUs::create([
            'icon' => $request->icon,
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        toastr()->success('Section Created Successfully');
        return to_route('admin.why-choose-us.index');
    }

    public function edit(string $id): View
    {
        $section = WhyChooseUs::findOrFail($id);
        return view('Admin.WhyChooseUs.edit', compact('section'));
    }
    public function update(WhyChooseUsCreateRequest $request, string $id): RedirectResponse
    {
        $section = WhyChooseUs::findOrFail($id);
        $section->update([
            'icon' => $request->icon,
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        toastr()->success('Section Updated Successfully');
        return to_route('admin.why-choose-us.index');
    }
    public function updateTitle(Request $request)
    {
        $request->validate([
            'why_choose_top_title' => ['required', 'max:100'],
            'why_choose_main_title' => ['required', 'max:200'],
            'why_choose_sub_title' => ['required', 'max:500'],
        ]);

        SectionTitle::updateOrCreate(
            ['key' => 'why_choose_top_title'],
            ['value' => $request->why_choose_top_title],
        );
        SectionTitle::updateOrCreate(
            ['key' => 'why_choose_main_title'],
            ['value' => $request->why_choose_main_title],

        );
        SectionTitle::updateOrCreate(
            ['key' => 'why_choose_sub_title'],
            ['value' => $request->why_choose_sub_title],

        );
        toastr()->success('Updated Successfully');
        return redirect()->back();
    }
    public function destroy(string $id)
    {
        try {
            $section = WhyChooseUs::findOrFail($id);
            $section->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Something Went Wrong!']);
        }
    }
}
