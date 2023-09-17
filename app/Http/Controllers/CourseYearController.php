<?php

namespace App\Http\Controllers;

use App\Models\CourseYear;
use Illuminate\Http\Request;

class CourseYearController extends Controller
{
    public function CourseYearList()
    {
        $CourseYears = CourseYear::where('status', 1)->latest()->paginate(10);
        return view('admin.courseyear_list', compact('CourseYears'));
    }

    public function CourseYearAdd()
    {
        return view('admin.courseyear_add');
    }

    public function CourseYearSave(Request $request)
    {

        CourseYear::create([
            'course_year' => $request->courseyr,
            'display_order' => $request->displayorder
        ]);

        $data['success'] = 'success';

        echo json_encode($data);
    }

    public function CourseYearEdit($id)
    {
        $CourseYear = CourseYear::where('id',$id)->first();
        return view('admin.courseyear_edit', compact('CourseYear'));
    }

    public function CourseYearUpdate(Request $request)
    {
        $courseID=$request->courseyrid;
        CourseYear::where('id',$courseID)->update([
            'course_year'=>$request->courseyr,
            'display_order'=>$request->displayorder
        ]);

        $data['success']='success';
        echo json_encode($data);

    }

    public function CourseYearDelete(Request $request)
    {
        $CourseyrID=$request->courseid;
        CourseYear::where('id',$CourseyrID)->update([
            'status'=>0
        ]);

        $data['success']='success';
        echo json_encode($data);

    }
}
