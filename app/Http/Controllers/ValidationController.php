<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Session;
use Hash;
use Auth;
class ValidationController extends Controller
{
    //
    function showChangePasswordGet($id) {

        $adm = Admin::find($id);
        // echo "pooja";die;
        return view('auth.passwords.change-password',compact('adm'));
    }

}
