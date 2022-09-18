<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;



Route::group(['namespace'=>'App\Http\Controllers\Admin','middleware' => 'auth:admin'], function () {

    Route::get('/', 'DashboardController@index')->name('admin.dashboard');

    #################### start categrys  #################################  

    Route::group(['prefix' => 'categorys'], function () {

        Route::resource('category','CategoryController', [
          'names' => [
              'index' => 'admin.categorys',
              'create' => 'admin.categorys.create',
              'store' => 'admin.categorys.store',
              'edit' => 'admin.categorys.edit',
              'update' => 'admin.categorys.update',
              //'destroy' => 'admin.categorys.delete',
              
              ]      
        ]);
        Route::post('category/destroy','CategoryController@destroy')->name('admin.categorys.delete');

     });
     #################### end categrys  #################################


       //##################### bagin product ######################
       Route::group(['prefix' => 'products'], function () {
       Route::resource('product', 'ProductController', [
        'names' => [
            'create' => 'admin.product.create',
            'index' => 'admin.product',
           'store' => 'admin.product.store',
           'edit' => 'admin.product.edit',
           'update' => 'admin.product.update',
           'show'=>'admin.product.show',
          // 'destroy' => 'admin.product.delete',       
           ] 
         ]);
         Route::post('product/destroy','ProductController@destroy')->name('admin.product.delete');
         Route::post('product/changeStatusProduct','ProductController@changeStause')->name('productStatus');
        });    
        //##################### end product ######################

        //##################### bagin customer ######################

        Route::group(['prefix' => 'customers'], function () {
          Route::resource('customer', 'CustomerController', [
           'names' => [
               'create' => 'admin.customer.create',
               'index' => 'admin.customer',
              'store' => 'admin.customer.store',
              'edit' => 'admin.customer.edit',
              'update' => 'admin.customer.update',
              'show'=>'admin.customer.show',
             // 'destroy' => 'admin.customer.delete',       
              ] 
            ]);
            Route::post('customer/destroy','CustomerController@destroy')->name('admin.customer.delete');
            Route::post('customer/changeStatusProduct','CustomerController@changeStause')->name('customerStatus');
           });    
           //##################### end customer ######################
    
});

















################################# Auth Admin ###############################


//Route::group(['namespace' => 'Admin'], function () {

    Route::get('login', [LoginController::class,'getLogin'])->name('get.admin.login');
 
    Route::post('getlogin', [LoginController::class,'Login'])->name('admin.login');
 
    Route::post('logout', [LoginController::class ,'logout'])->name('admin.logout');
// });
 
 ############################ end Auth Admin  #################
 