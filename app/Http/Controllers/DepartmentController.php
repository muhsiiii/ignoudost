<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function Departments()
    {
        $Departments=Department::where('status','!=',0)->paginate(10);
        $DepartmentCount=Department::where('status','!=',0)->count();
        return view('admin.departments',compact('Departments','DepartmentCount'));
    }

    public function AddDepartments()
    {
        return view('admin.add_departments');
    }

    public function DepartmentsEdit($id)
    {
        $Department=Department::find($id);
        return view('admin.edit_departments',compact('Department'));
    }

    public function DepartmentDestroy($id)
    {


        Department::where('id',$id)->update([
            'status'=>0
        ]);
        Course::where('department',$id)->update([
            'status'=>0
        ]);

        return redirect()->route('department')->with('success','Department Deleted Success');
    }
}
