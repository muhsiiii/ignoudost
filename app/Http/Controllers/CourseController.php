<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseYear;
use App\Models\Department;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function Course()
    {
        $Courses=Course::where('status',1)->paginate(10);
        $CourseCount=Course::where('status',1)->count();
        return view('admin.course',compact('Courses','CourseCount'));
    }

    public function AddCourse()
    {
        $Departments=Department::where('status',1)->latest()->get();
        $CourseYears=CourseYear::where('status',1)->latest()->get();
        return view('admin.add_course',compact('Departments','CourseYears'));
    }

    public function CourseEdit($id)
    {
        $Course=Course::find($id);
        $Departments=Department::where('status',1)->latest()->get();
        $CourseYears=CourseYear::where('status',1)->latest()->get();
        return view('admin.edit_course',compact('Departments','Course','CourseYears'));
    }

    public function CourseDestroy($id)
    {
        $Course=Course::find($id);
        $Course->delete();

        return redirect()->route('coursetable')->with('success','Course Deleted Success');
    }
}
