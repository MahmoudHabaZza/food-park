<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Models\PageBuilder;
use Illuminate\Http\Request;

class CustomPageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $slug)
    {
        $page = PageBuilder::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('EndUser.Pages.custom-page',compact('page'));
    }
}
