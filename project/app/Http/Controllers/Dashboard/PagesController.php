<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\Blog;
use App\Models\BlogCategory;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function service()
    {
        return view('dashboard.service');
    }

    public function blog()
    {
        $data = array();
        $data["blogs"] = Blog::all();

        return view('dashboard.blog', $data);
    }

    public function blogShow($id)
    {
        $cats = BlogCategory::all();
        $data = Blog::findOrFail($id);
        return view('dashboard.blogShow',compact('data','cats'));
    }


    public function about()
    {
        return view('dashboard.about');
    }
}
