<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use validator;
use Session;


class CategoryController extends Controller
{
    //

    function category_list(){
        $category = Category::all();
        return view ('Admin.category.category_list',compact('category'));
    }

    function addcategory_list(){

        return view ('Admin.category.category_add');
    }

    function savecategory_list(Request $request){

        $this->validate($request,[
        'name'  =>  'required',       
        ]);
        
        $cat = new Category;      
        $cat->name=$request->name;
        $cat->save();

        return redirect('category-list')->with('status','Category Added Successfully');
    }

    function edit_category($id){

        $category = Category::find($id);
        return view ('Admin.category.category_edit',compact('category'));
    }

    function update_category(Request $request){

        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->update();        
        return redirect ('category-list')->with('status','Category updated');

    }
    function delete_category($id){
      

       $category=Category::find($id);
       $category->delete();
       return redirect ('category-list')->with('status', 'category Deleted');
     
    }
}
