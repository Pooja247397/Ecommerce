<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Admin;
use Hash;
use Session;
class AdminLoginController extends Controller
{
//
    function submit_login(Request $request){
        $this->validate($request,[
            'email'  =>  'required|email',
            'password' => 'required| min:5'
        ]);

        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );
        $admin = Admin::where('email', '=', $request->email)->first();
     if (empty($admin) || $admin == "" ) {
         return back()->with('error','Invalid Email');
        }
     if (!Hash::check($request->password, $admin->password)) {
            return back()->with('error','wrong login  password details');
         }
        Session::put('admin', $admin);
        return redirect ('admin-dashboard');
       
    }    
}
