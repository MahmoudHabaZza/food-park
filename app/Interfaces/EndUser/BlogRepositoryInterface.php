<?php

namespace App\Interfaces\EndUser;

use Illuminate\Http\Request;

interface BlogRepositoryInterface {
    public function index(Request $request);
    public function blogDetails(string $slug);
    public function blogCommentStore(Request $request, string $blogId);
}
