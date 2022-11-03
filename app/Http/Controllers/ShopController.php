<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use DB;
use Session;
class ShopController extends Controller
{
    //
    function header_shop(){
        $category = Category::all();
        $product  = Product::all();
        return view('frontend.shop',compact('category','product'));
    }

    function product_cart(Request $request){
        $user = Session::get('user'); 

        if($user){
         $cart = Cart::where(['user_id'=> $user->id , 'product_id'=> $request->product_id ])->first(); //echo $user['id']; die();
         if(empty($cart) && $cart == ""){
             $cart = new Cart;   
             $cart->quantity = 1;      
         }else{
             $cart->quantity = $cart->quantity +1;  
         }
        $cart->product_id=$request->product_id; 
                
         $cart->user_id=$user["id"];        
         $cart->save();            
    return redirect ('shop')->with('success','Product added to cart');        
    }
    else{

        return redirect ('loginsignup');
    }
    }
    function view_product($id){

         $data = Product::find($id);
           $cat_id =   explode(',', $data->cat_id);
           // print_r($cat_id); die;
           $category= array();
           foreach($cat_id as $cids){
            
               $category[] = Category::find($cids);
           }  
        // echo "<pre>";   print_r($category); die;
         // $product = Product::all()->pluck('cat_id', 'id');
  
         return view('frontend.view_product',compact('data','category'));
    }

       function cart_list(){

       $user = Session::get('user')['id'];
       $product = DB::table('carts')->join('products','carts.product_id','=','products.id')->where('carts.user_id',$user)->select('products.*','carts.*')->get();
       // echo "<pre>";
       // print_r($product);die;
        return view('frontend.cart_list',compact('product'));
       }
    function add_quantity(Request $request)
    {
         $user = Session::get('user'); 
         $data = Cart::where(['user_id'=> $user->id , 'product_id'=> $request->product_id ])->first();
         $total_qty = $data->quantity + $request->quantity;
         // $cart= Cart::find($data->id);
         $data->quantity=$total_qty;
         $data->save();

          return redirect('cartlist');
    }

    function remove_cart($id){

       $cart=Cart::find($id);
       $cart->delete();
       return redirect()->back();

    }

    function updateQty(Request $request){
        $user = Session::get('user'); 
        $cartData = Cart::find($request->cart_id);   
        // echo $user->id." ".$request->product_id;die;  
    // echo "<pre>"; print_r($cartData);die; 
        $cartData->quantity=$request->qty;      
        $cartData->save(); 
        

        return json_encode(['status'=>true,'msg'=>'Quantity updated successfully']);
    }
   

    
}
