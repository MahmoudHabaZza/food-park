<?php

namespace App\Repositories\Admin;

use App\DataTables\BlogDataTable;
use App\Http\Requests\BlogCreateRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Interfaces\Admin\BlogRepositoryInterface;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Traits\UploadFileTrait;
use Str;

class BlogRepository implements BlogRepositoryInterface
{

    use UploadFileTrait;
    public function index(BlogDataTable $dataTable)
    {
        return $dataTable->render('Admin.Blog.index');
    }
    public function create()
    {
        $blog_categories = BlogCategory::get();
        return view('Admin.Blog.create', compact('blog_categories'));
    }
    public function store(BlogCreateRequest $request)
    {
        $imagePath = $this->uploadImage($request, 'image',);
        Blog::create([
            'image' => $imagePath,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'blog_category_id' => $request->blog_category_id,
            'user_id' => auth()->user()->id,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'status' => $request->status
        ]);

        toastr()->success('Blog has been created');
        return to_route('admin.blogs.index');
    }
    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);
        $blog_categories = BlogCategory::get();
        return view('Admin.Blog.edit', compact('blog', 'blog_categories'));
    }
    public function update(BlogUpdateRequest $request, string $id)
    {
        $blog = Blog::findOrFail($id);
        $imagePath = $this->uploadImage($request, 'image', 'uploads', $request->old_image);
        $blog->update([
            'image' => !empty($imagePath) ? $imagePath : $request->old_image,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'blog_category_id' => $request->blog_category_id,
            'user_id' => auth()->user()->id,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'status' => $request->status
        ]);

        toastr()->success('Blog has been updated');
        return to_route('admin.blogs.index');
    }
    public function destroy(string $id)
    {
        try{
            $blog = Blog::findOrFail($id);
            $this->removeImage($blog->image);
            $blog->delete();
            return response(['status' =>'success','message' => 'Blog has been deleted']);
        }catch(\Exception $e){
            return response(['status' => 'error','message' => 'There is an error']);
        }
    }
}
