<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class FrontendController extends Controller
{
    //
     function index()
    {
       

        $product  = Product::all();
        return view('frontend.home',compact('product'));
    }
}
