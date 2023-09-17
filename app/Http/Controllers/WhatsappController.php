<?php

namespace App\Http\Controllers;

use App\Models\WpParent;
use App\Models\WpSub;
use Illuminate\Http\Request;

class WhatsappController extends Controller
{
    public function WhatsappList()
    {
        $Courses=WpParent::where('status',1)->paginate(10);
        $CourseCount=WpParent::where('status',1)->count();
        return view('admin.whatsapp_list',compact('Courses','CourseCount'));
    }

    public function WhatsappAdd()
    {
        return view('admin.whatsapp_add');
    }

    public function WhatsappSave(Request $request)
    {
        WpParent::create([
            'name'=>$request->course_name,
            'whatsapp_link'=>$request->link
        ]);

        $data['success']='success';
        echo json_encode($data);
    }

    public function WhatsappEdit($id)
    {
        $Course=WpParent::find($id);
        return view('admin.whatsapp_edit',compact('Course'));

    }

    public function WhatsappUpdate(Request $request)
    {
        $course_id=$request->course_id;

        WpParent::where('id',$course_id)->update([
            'name'=>$request->course_name,
            'whatsapp_link'=>$request->link
        ]);

        $data['success']='success';
        echo json_encode($data);

    }

    public function WhatsappLinkList($id)
    {
        // return "hello";
        // die;
        $WhatsappLinks=WpSub::where('parent_id',$id)->where('status',1)->get();
        return view('admin.whatsapp_link_list',compact('id','WhatsappLinks'));
    }

    public function WhatsappLinkSave(Request $request)
    {
        WpSub::create([
            'parent_id'=>$request->parent_id,
            'whatsapp_link'=>$request->link
        ]);

        $data['success']='success';
        echo json_encode($data);

    }

    public function WhatsappLinkDelete(Request $request)
    {

        $courseID=$request->course_id;

        WpParent::where('id',$courseID)->delete();


        $data['success']='success';
        echo json_encode($data);

    }
}
