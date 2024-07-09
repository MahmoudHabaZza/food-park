<?php

namespace App\Repositories\Admin;

use App\DataTables\BlogCategoryDataTable;
use App\Interfaces\Admin\BlogCategoryRepositoryInterface;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Str;

class BlogCategoryRepository implements BlogCategoryRepositoryInterface
{
    public function index(BlogCategoryDataTable $dataTable)
    {
        return $dataTable->render('Admin.Blog.Category.index');
    }
    public function create()
    {
        return view('Admin.Blog.Category.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:blog_categories,name', 'max:50'],
            'status' => ['required', 'boolean']

        ]);

        BlogCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->status
        ]);

        toastr()->success('Blog Category has been created');
        return to_route('admin.blog-categories.index');
    }
    public function edit(string $id)
    {
        $blog_category = BlogCategory::findOrFail($id);
        return view('Admin.Blog.Category.edit', compact('blog_category'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:blog_categories,name,' . $id, 'max:50'],
            'status' => ['required', 'boolean']
        ]);

        $blog_category = BlogCategory::findOrFail($id);
        $blog_category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->status
        ]);

        toastr()->success('Blog Category has been updated');
        return to_route('admin.blog-categories.index');
    }
    public function destroy(string $id){
        try {
            $blog_category = BlogCategory::findOrFail($id);
            $blog_category->delete();
            return response(['status' =>'success','message' => 'Blog Category has been deleted']);
        }catch(\Exception $e){
            return response(['status' => 'error','message' => 'There is an error']);
        }
    }
}
