<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Session;
use Validator;
use Hash;
class AdminController extends Controller
{
    function dashboard()
    {   
        
        $admin = Admin::all();
        return view('Admin.dashboard',compact('admin'));
    }

    function logout()
    {
        Session::flush();
        return redirect('/')->with('success','Logout');;
    }

    function admin_edit($id)
    {
        $adm = Admin::find($id);
        return view('Admin.edit',compact('adm'));
    }

    function admin_update(Request $request)
    {   
        $admin =Admin::find($request->id);
        $admin->name=$request->name;
        $admin->email=$request->email;
      
        if($request->hasFile('image'))
        {   

            $destination_path = public_path('storage/admin_images/' .$admin->image);
              if(file_exists($destination_path))
              {  
                unlink($destination_path);
               }  
            $destination_path = 'public/admin_images/';
            $image = $request->file('image');
            $img_name = time().rand(1,100).'.'.$image->extension();
            $path = $request->file('image')->storeAs($destination_path,$img_name);
           $admin['image']=$img_name;

            
        }
        $admin->update();
        return view ('Admin.dashboard');
    }

       function change_password($id)
    {  

       $data = Admin::find($id); 
       return view('Admin.changepassword',compact('data'));
    }

    function update_password(Request $request){

         $request->validate([
            'current_password' => 'required',
            'new_password'=>  'required|min:6',
            'confirm_password'=>'required'
        ]); 

         $admin_data = Admin::where('id', $request->id)->first();
         $user = $admin_data->password;        
         if (!Hash::check($request->current_password, $admin_data->password)) {
         return back()->with('error','Invalid current password');
         }  
         if(!Hash::check($request->new_password,$request->confirm_password)) {
          return back()->with('error','Password does not match');

         $admin_data->password = Hash::make($request->new_password);
         $admin_data->save();         
       }
   }    
}

?>