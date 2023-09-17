<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCatController extends Controller
{
    public function BlogCategoryList()
    {
        $BlogCats=BlogCategory::where('status',1)->get();
        return view('admin.blogcategorylist',compact('BlogCats'));
    }

    public function BlogCategoryAdd()
    {
        return view('admin.blogcategoryadd');
    }

    public function BlogCategorySave(Request $request)
    {
        BlogCategory::create([
            'category'=>$request->blogcat
        ]);

        $data['success']='success';
        echo json_encode($data);

    }

    public function BlogCategoryEdit(Request $request,$Cid)
    {
        $BlogCat=BlogCategory::where('id',$Cid)->first();
        return view('admin.blogcategoryedit',compact('BlogCat'));
    }

    public function BlogCategoryUpdate(Request $request)
    {

        BlogCategory::where('id',$request->cat_id)->update([
            'category'=>$request->category
        ]);

        $data['success']='success';
        echo json_encode($data);

    }

    public function BlogCategoryDelete(Request $request)
    {
        BlogCategory::where('id',$request->cid)->update([
            'status'=>0
        ]);

        Blog::where('blog_category',$request->cid)->update([
            'status'=>0
        ]);

        $data['success']='success';
        echo json_encode($data);


    }
}
