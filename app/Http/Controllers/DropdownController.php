<?php

namespace App\Http\Controllers;

use App\Models\Dropdown;
use Illuminate\Http\Request;

class DropdownController extends Controller
{
    public function DropdownList()
    {
        $Dropdowns=Dropdown::latest()->paginate(10);
        return view('admin.dropdownlist',compact('Dropdowns'));
    }

    public function DropdownSave(Request $request)
    {

        $Dropdowns=Dropdown::create([
            'type'=>$request->type,
            'content'=>$request->content
        ]);

        if($Dropdowns)
        {
           $data['success']='success';
        }else{
           $data['error']='error';
        }

        echo json_encode($data);

    }

    public function DropdownUpdate(Request $request)
    {
        $DropdownUpdate=Dropdown::where('id',$request->did)->update([
            'type'=>$request->type,
            'content'=>$request->content
        ]);

        if($DropdownUpdate)
        {
            $data['success']='success';
        }else{
            $data['error']='error';
        }

        echo json_encode($data);

    }

    public function DropdownDelete(Request $request)
    {
        $Dropdowns=Dropdown::where('id',$request->did)->delete();

        $data['success']='success';
        echo json_encode($data);

    }
}
