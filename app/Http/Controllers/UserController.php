<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use validator;
use Hash;
use Session;
class UserController extends Controller
{
    //
    function loginsignup_page(){

        if(session()->has('user')){
         return redirect('home');
         }
        return view('frontend.login');
         }

    function userlogin(Request $request)

    {        
       $user = User::where('email','=',$request->email)->first();
       if(!$user || !Hash::check($request->password,$user->password)){

        return "username or password is incorrect";
       }
       else{
        $request->session()->put('user',$user);
        return redirect('/home');
       }
    }

    function userregister()
    {

        return view('frontend.register');
    }

    function submit_form(Request $request)
    {
      $this->validate($request,[
            'name'  => 'required',
            'email'  =>  'required|email',
            'password' => 'required| min:6'
        ]);
        
        $user = new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();

        return redirect ('loginsignup');
    }

    function user_logout(){

        Session::flush();
        return redirect('/home');
    }
}
