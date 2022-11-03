<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CheckoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Admin Routing
Route::get('/', function () {  
    return view('Admin.login');
});

Route::post('submit_login',[AdminLoginController::class,'submit_login']);
Route::group(['middleware' => ['admin_login']], function () 
{
Route::get('admin-dashboard',[AdminController::class,'dashboard']);
Route::get('logout',[AdminController::class,'logout']);
Route::get('admin-edit/{id}',[AdminController::class,'admin_edit']);
Route::post('admin-update',[AdminController::class,'admin_update']);
Route::get('change-password/{id}',[AdminController::class,'change_password']);
Route::post('admin-update-password',[AdminController::class,'update_password']);

// Product routing
Route::get('product-list',[ProductController::class,'product_list']);
Route::get('add-product',[ProductController::class,'addproduct_list']);
Route::post('save-productlist',[ProductController::class,'saveproduct_list']);
Route::get('edit-product/{id}',[ProductController::class,'edit_product']);
Route::post('update-product',[ProductController::class,'update_product']);
Route::get('delete-product/{id}',[ProductController::class,'delete_product']);

// Category routing
Route::get('category-list',[CategoryController::class,'category_list']);
Route::get('add-category',[CategoryController::class,'addcategory_list']);
Route::post('save-categorylist',[CategoryController::class,'savecategory_list']);
Route::get('edit-category/{id}',[CategoryController::class,'edit_category']);
Route::post('update-category',[CategoryController::class,'update_category']);
Route::get('delete-category/{id}',[CategoryController::class,'delete_category']);
});

// userlogin routing
Route::get('loginsignup',[UserController::class,'loginsignup_page']);
Route::get('register',[UserController::class,'userregister']);
Route::post('submit',[UserController::class,'submit_form']);
Route::post('login',[UserController::class,'userlogin']);
Route::group(['middleware' => ['user_auth']], function ()
{
    // Frontend routing
Route::get('/home',[FrontendController::class,'index']);
Route::get('userlogout',[UserController::class,'user_logout']);
});
// Shop routing
Route::get('shop',[ShopController::class,'header_shop']);
Route::post('addtocart',[ShopController::class,'product_cart']);
Route::get('viewproduct/{id}',[ShopController::class,'view_product']);
Route::post('addquantity',[ShopController::class,'add_quantity']);
Route::get('cartlist',[ShopController::class,'cart_list']);
Route::get('removecart/{id}',[ShopController::class,'remove_cart']);

// Route::post('updatequantity',[ShopController::class,'update_cart']);
Route::post('updateQty',[ShopController::class,'updateQty']);
Route::get('checkout',[CheckoutController::class,'checkout_item']);