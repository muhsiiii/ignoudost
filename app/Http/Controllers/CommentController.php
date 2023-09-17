<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function Comments()
    {
        $Comments=Comment::paginate(10);
        $CommentCount=Comment::count();
        return view('admin.comments',compact('Comments','CommentCount'));
    }
}
