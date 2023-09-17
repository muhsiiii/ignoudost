<?php

namespace App\Http\Controllers;

use App\Models\Academic;
use Illuminate\Http\Request;

class AcademicController extends Controller
{

    public function Academics()
    {
        $Academics = Academic::latest()->paginate(10);
        $AcademicCount = Academic::latest()->count();
        return view('admin.academics',compact('Academics','AcademicCount'));
    }
    public function addAcademics()
    {
        return view('admin.add_academics');
    }
}
