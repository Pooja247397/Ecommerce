<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use DB;
use Session;

class CheckoutController extends Controller
{
    //

    public function checkout_item()
    {
        $user = Session::get('user')['id'];
        $product = DB::table('carts')->join('products','carts.product_id','=','products.id')->where('carts.user_id',$user)->select('products.*','carts.*')->get();
        return view('frontend.checkout',compact('product'));
        
    }
}
