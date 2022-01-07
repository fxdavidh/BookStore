<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    function changePassword(Request $request){
        $error = "";
        if($request->new_pass != $request->conf_pass){
            $error = "New password must be the same with confirmation password";
            return view('auth.passwords.changepassword',[
                'error' => $error
            ]);
        }else if(!Hash::check($request->old_pass, Auth::user()->password)){
            $error = "Old password is incorrect";
            return view('auth.passwords.changepassword',[
                'error' => $error
            ]);
        }else if(Hash::check($request->new_pass, Auth::user()->password)){
            $error = "New password cannot be the same with Old password";
            return view('auth.passwords.changepassword',[
                'error' => $error
            ]);
        }else{
            User::where('id',Auth::user()->id)->update(['password' => Hash::make($request->new_pass)]);
            return (new HomeController)->profile();
        }
    }
}
