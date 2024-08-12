<?php

namespace App\Repositories\EndUser;
use App\Interfaces\EndUser\BlogRepositoryInterface;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use Illuminate\Http\Request;

class BlogRepository implements BlogRepositoryInterface
{

    public function index(Request $request)
    {
        $blogs = Blog::withCount(['comments' => function ($query) {
            $query->where('status', 1);
        }])->with(['blogCategory', 'user'])->where('status', 1);

        if ($request->has('search') && $request->filled('search')) {
            $blogs->where(function ($query) use ($request) {
                $query->where('title', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('content', 'LIKE', '%' . $request->search . '%');
            });
        }

        if ($request->has('category') && $request->filled('category')) {
            $blogs->whereHas('blogCategory', function ($query) use ($request) {
                $query->where('slug', 'LIKE', '%' . $request->category . '%');
            });
        }

        $blogs = $blogs->latest()->paginate(9);
        $categories = BlogCategory::where('status', 1)->get();
        return view('EndUser.pages.blog-view', compact('blogs', 'categories'));
    }
    public function blogDetails($slug)
    {
        $blog = Blog::with(['blogCategory', 'user'])->where('slug', $slug)->where('status', 1)->firstOrFail();
        $comments = $blog->comments()->where('status', 1)->orderBy('created_at', 'DESC')->paginate(15);
        $nextBlog = Blog::select('id', 'image', 'slug', 'title')->where('status', '1')
            ->where('id', '>', $blog->id)->orderBy('id', 'ASC')->first();
        $prevBlog = Blog::select('id', 'image', 'slug', 'title')->where('status', '1')
            ->where('id', '<', $blog->id)->orderBy('id', 'DESC')->first();
        $latestBlogs = Blog::select('id', 'image', 'slug', 'title', 'created_at')
            ->where('status', 1)->where('id', '!=', $blog->id)->latest()->take(5)->get();
        $categories = BlogCategory::withCount(['blogs' => function ($query) {
            $query->where('status', 1);
        }])->where('status', 1)->take(5)->get();
        return view('EndUser.pages.blog-details', compact(
            'blog',
            'nextBlog',
            'prevBlog',
            'latestBlogs',
            'categories',
            'comments',

        ));
    }
    public function blogCommentStore(Request $request, string $blogId)
    {
        $request->validate([
            'comment' => ['required', 'max:500']
        ]);

        Blog::findOrFail($blogId);
        BlogComment::create([
            'blog_id' => $blogId,
            'user_id' => auth()->user()->id,
            'comment' => $request->comment,
        ]);

        toastr()->success('Comment Submitted Successfully, Wait for approval from admin');
        return redirect()->back();
    }
}
