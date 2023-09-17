<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function PasswordChange()
    {
        return view('admin.layouts.password.password_change');
    }

    public function PasswordSave(Request $request)
    {
        $Oldpassword=$request->oldpwd;
        $currentPassword=auth()->user()->password;
        // return $currentPassword;
        $adminID=auth()->user()->id;

        if(Hash::check($Oldpassword, $currentPassword)){
              User::where('id',$adminID)->update([
                   'password'=>bcrypt($request->newpwd),
              ]);
              $data['success']='success';
            } else {
               $data['error']='error';
            }
            echo json_encode($data);
    }
}
