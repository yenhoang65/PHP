<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class FrontendBLogController extends Controller
{
    public function index(Request $request){
        $blogs = Blog::Where('status',1)->paginate(20);
        return view('frontend.pages.blog',compact('blogs'));
    }
}
