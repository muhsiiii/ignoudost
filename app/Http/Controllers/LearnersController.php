<?php

namespace App\Http\Controllers;

use App\Models\Learner;
use Illuminate\Http\Request;

class LearnersController extends Controller
{
    public function LearbersList()
    {
        $Learners=Learner::all();
        return view('admin.learnerslist',compact('Learners'));
    }

    public function LearbersUpdate(Request $request)
    {
        $LearnersSave=Learner::where('id',$request->lid)->update([
            'title'=>$request->title
        ]);

        if($LearnersSave){
            $data['success']='success';
        }else{
            $data['error']='error';
        }

        echo json_encode($data);

    }


}
