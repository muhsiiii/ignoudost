<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function FAQ()
    {
        $FAQs=FAQ::paginate(10);
        $total = FAQ::count();
        return view('admin.faq',compact('FAQs','total'));
    }

    public function AddFAQ()
    {
        return view('admin.add_faq');
    }

    public function FAQEdit($id)
    {
        $FAQ=FAQ::find($id);
        return view('admin.faq_edit',compact('FAQ'));
    }

    public function FAQupdate(Request $request)
    {
        FAQ::where('id',$request->fid)->update([
            'title'=>$request->title,
            'description'=>$request->description
        ]);

        $data['success']='success';
        echo json_encode($data);

    }

    public function FAQdelete(Request $request)
    {
           FAQ::where('id',$request->fid)->delete();
           $data['success']='success';
           echo json_encode($data);
    }
}
