<?php

namespace App\Repositories\Admin;

use App\DataTables\PageBuilderDataTable;
use App\Interfaces\Admin\PageBuilderRepositoryInterface;
use App\Models\PageBuilder;
use Illuminate\Http\Request;
use Str;

class PageBuilderRepository implements PageBuilderRepositoryInterface
{
    public function index(PageBuilderDataTable $dataTable)
    {
        return $dataTable->render('Admin.Page-Builder.index');
    }
    public function create()
    {
        return view('Admin.Page-Builder.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','max:255','unique:page_builders,name'],
            'content' => ['required'],
            'status' => ['required','boolean'],
        ]);

        PageBuilder::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'content' => $request->content,
           'status' => $request->status,
        ]);

        toastr()->success('Page created successfully');
        return redirect()->route('admin.page-builder.index');
    }
    public function edit(string $id)
    {
        $page = PageBuilder::findOrFail($id);
        return view('Admin.Page-Builder.edit',compact('page'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:page_builders,name,'.$id],
            'content' => ['required'],
            'status' => ['required', 'boolean'],
        ]);

        $page = PageBuilder::findOrFail($id);

        $page->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'content' => $request->content,
            'status' => $request->status,
        ]);

        toastr()->success('Page Updated successfully');
        return redirect()->route('admin.page-builder.index');
    }

    public function destroy(string $id)
    {
        try
        {
            $page = PageBuilder::findOrFail($id);
            $page->delete();
            return response(['status' => 'success','message' => 'Page deleted successfully']);
        }catch (\Exception $e){
            return response(['status' => 'error','message' => 'Something went wrong!']);
        }
    }

}
