<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function TestimonialList()
    {
        $Testimonials=Testimonial::paginate(10);
        $TestimonialCount=Testimonial::count();
        return view('admin.testimonial_list',compact('Testimonials','TestimonialCount'));
    }

    public  function TestimonialAdd()
    {
        return view('admin.testimonial_add');
    }

    public function TestimonialSave(Request $request)
    {
        Testimonial::create([
            'user_name' => $request->name,
            'user_university' => $request->university,
            'user_content' => $request->content
        ]);

        $data['success'] = 'success';
        echo json_encode($data);
    }

    public function TestimonialEdit($id)
    {
        $Testimonial=Testimonial::find($id);
        return view('admin.testimonial_edit',compact('Testimonial'));
    }

    public function TestimonialUpdate(Request $request)
    {

        $TestimonialID=$request->test_id;

        Testimonial::where('id',$TestimonialID)->update([
            'user_name' => $request->name,
            'user_university' => $request->university,
            'user_content' => $request->content
        ]);

        $data['success'] = 'success';
        echo json_encode($data);
    }

    public function TestimonialDelete(Request $request)
    {
        $Test_ID=$request->test_id;

        Testimonial::where('id',$Test_ID)->delete();

         $data['success'] = 'success';
        echo json_encode($data);

    }
}
