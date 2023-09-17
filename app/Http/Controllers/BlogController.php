<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function Blog()
    {
        $blogs=Blog::where('status',1)->paginate(10);
        $blogCount=Blog::count();
        return view('admin.blog',compact('blogs','blogCount'));
    }

    public function AddBlog()
    {
        $BlogCategories=BlogCategory::where('status',1)->get();
        return view('admin.add_blog',compact('BlogCategories'));
    }
}
