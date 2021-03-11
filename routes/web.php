<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware'=>'web'],function(){
    Route::get('/', 'IndexController@index')->name('index');
Route::get('/product_detail/{id}', 'ProductDetailController@product_detail');
//Route::get('/addToCart/{product}', 'ProductDetailController@addtocart');
//Route::get('/showcart', 'ProductDetailController@showcart');
Route::get('/addToCart/{id}', 'CartController@addtocart')->name('addtocart');
Route::get('/showcart/{id}', 'CartController@showcart');
Route::delete('/del/{id}', 'CartController@del')->name('del');
Route::post('/update/{id}', 'CartController@update')->name('update');
Route::get('product_list', 'ProductListController@product_list');
Route::get('/my-account', 'HomeController@index');
Route::post('/my-account/{id}', 'HomeController@update')->name('update');
Route::get('/Addresses', 'CheckOutController@showaddress');
Route::post('/Addresses/{id}', 'CheckOutController@saveaddress');
Route::get('/order', 'CheckOutController@showorder');
Route::post('/order/{id}', 'CheckOutController@saveorder');
Route::get('/orderdelete/{id}', 'CheckOutController@delorder');
Route::get('/WishList/{id}', 'WishListController@showwishe');
Route::get('AddWhise/{id}', 'WishListController@addtowhise');
Route::delete('/delwishe/{id}', 'WishListController@delwishe');
Route::get('/AddReview/{id}', 'ReviewController@addreview');
Route::get('/Ctegory/{id}', 'Category2Controller@showcatecory');
//Route::get('/showReview/{id}', 'ReviewController@showreview');



});

Auth::routes();




Route::view('admin','admin.home')->middleware('admin:admin');
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
    Route::get('login','AdminAuth@login');
    Route::post('login','AdminAuth@dologin');
    Route::any('logoutadmin','AdminAuth@logoutadmin');
    Route::get('allproducts','AdminProductController@showproduct')->middleware('admin:admin');
    Route::get('AllReview','AdminReviewController@showreview')->middleware('admin:admin');
    Route::get('Approve/{id}','AdminReviewController@approvereview')->middleware('admin:admin');
    Route::get('update/{id}','AdminProductController@updateproduct')->middleware('admin:admin');
    Route::post('modifyproduct/{id}','AdminProductController@modifyproduct')->middleware('admin:admin');

    Route::get('Addproduct','AdminProductController@Addproduct')->middleware('admin:admin');
    Route::post('Addproduct','AdminProductController@Addnewproduct')->middleware('admin:admin');
    Route::delete('/del/{id}', 'AdminProductController@delproduct')->name('del');
    Route::get('AllCategories','AddCategoryController@showcategory')->middleware('admin:admin');
    Route::get('AddCategory','AddCategoryController@index')->middleware('admin:admin');
    Route::post('AddCategory','AddCategoryController@Addcategory')->middleware('admin:admin');
    Route::delete('/DelCategory/{id}', 'AddCategoryController@delcategory')->name('DelCategory');
   

});
