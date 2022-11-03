<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use validator;
use Session;


class ProductController extends Controller
{

    function product_list(){
        $category = Product::with('categorie')->get();
        // $title = 'Product List';

     return view ('Admin.products.product_list',compact('category'));
    }

    function addproduct_list(){
        $category  = Category::all();
            
        return view ('Admin.products.product_add',compact('category'));
    }

    function saveproduct_list(Request $request){

         $this->validate($request,[
        'title'  => 'required',
         'description'  => 'required',
          'price'  => 'required'
        ]);

          $mcat_id = implode(',',$request->mcat_id);

        $product = new Product;       
        $product->title=$request->title;
        $product->category_id=$request->category_id;
        $product->cat_id=$mcat_id;
        $product->description=$request->description;

        if($request->hasFile('product_image'))
        {
            $destination_path = "public/product_images/";
            $image = $request->file('product_image');
            $img_name = time().rand(1,100).'.'.$image->extension();
            $path = $request->file('product_image')->storeAs($destination_path,$img_name);
        }
        $product['product_image']=$img_name;

        $product->price=$request->price;
        $product->save();
        return redirect('product-list')->with('status','Product Added Successfully');
    }

    function edit_product($id){

        $product = Product::findOrFail($id);       
        $category  = Category::all();
        return view('Admin.products.product_edit',compact('product','category'));
    }

    function update_product(Request $request){

        $mcat_id = implode(',',$request->mcat_id);
        $product = Product::find($request->id);         
        $product->title = $request->title;

        if($request->hasFile('product_image'))
        {   
            $destination_path = public_path('storage/product_images/' .$product->product_image);
              if(file_exists($destination_path))
              {  
                unlink($destination_path);
               }  
            $destination_path = 'public/product_images/';
            $image = $request->file('product_image');
            $img_name = time().rand(1,100).'.'.$image->extension();
            $path = $request->file('product_image')->storeAs($destination_path,$img_name);
              $product['product_image']=$img_name;
        }
      
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->cat_id=$mcat_id;
        $product->update();
        return redirect('product-list')->with('status','Product updated successfully');
    
}

function delete_product($id){

    $product=Product::find($id);
    $product->delete();
    return redirect ('product-list')->with('status', 'product Deleted');
}

 static function cartitem()
    {
    
         $user = Session::get('user'); 
          if($user){
              return Cart::where('user_id',$user['id'])->count();
          } 
       
       
    }

}
