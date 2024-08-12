<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Interfaces\EndUser\BlogRepositoryInterface;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $blog;
    public function __construct(BlogRepositoryInterface $blog)
    {
        $this->blog = $blog;
    }
    public function index(Request $request)
    {
        return $this->blog->index($request);
    }
    public function blogDetails($slug)
    {
        return $this->blog->blogDetails($slug);
    }
    public function blogCommentStore(Request $request, string $blogId)
    {
        return $this->blog->blogCommentStore($request, $blogId);
    }
}
