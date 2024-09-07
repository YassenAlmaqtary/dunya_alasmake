<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\SubscriptController;

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


    //##################### bagin cooks ######################
    Route::group(['prefix' => 'cooks'], function () {
      Route::resource('cook', 'CookController', [
       'names' => [
           'create' => 'admin.cook.create',
           'index' => 'admin.cook',
           'store' => 'admin.cook.store',
          'edit' => 'admin.cook.edit',
          'update' => 'admin.cook.update',
          'show'=>'admin.cook.show'
         // 'destroy' => 'admin.product.delete',       
          ] 
        ]);
        Route::post('cook/destroy','CookController@destroy')->name('admin.cook.delete');
        Route::post('cook/changeStatusProduct','CookController@changeStause')->name('cookStatus');
       });    
       //##################### end cooks ######################


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
           //##################### end customer ######################//

           
       //##################### bagin apout ######################//

        Route::group(['prefix' => 'apouts'], function () {
          Route::resource('apout', 'AboutController', [
           'names' => [
               'create' => 'admin.apout.create',
               'index' => 'admin.apout',
              'store' => 'admin.apout.store',
              'edit' => 'admin.apout.edit',
              'update' => 'admin.apout.update',
              'show'=>'admin.apout.show',
              'destroy' => 'admin.apout.delete',       
           ],
          ])->only(['create','index','store','edit']);

            Route::post('apout/destroy','AboutController@destroy')->name('admin.apout.delete');
            Route::post('apout/changeStatusaput','AboutController@changeStause')->name('apoutStatus');
           });    
           //##################### end apout ######################//


        //##################### bagin article  ######################//

        Route::group(['prefix' => 'article'], function () {
          Route::resource('article', 'ArticleController', [
           'names' => [
               'create' => 'admin.article.create',
               'index' => 'admin.article',
              'store' => 'admin.article.store',
              'edit' => 'admin.article.edit',
              'update' => 'admin.article.update',
              'show'=>'admin.article.show',
             // 'destroy' => 'admin.apout.delete',       
              ] 
            ])->only(['create','index','store','edit']);
            Route::post('article/destroy','ArticleController@destroy')->name('admin.article.delete');
            Route::post('article/changeStatusaput','ArticleController@changeStause')->name('articleStatus');
           });    
           //##################### end article ######################//


          //##################### bigin subscript ######################//
          Route::group(['prefix' => 'subscript'], function () {
            Route::get('subscripts','SubscriptController@index')->name('admin.subscript');
            Route::post('subscript/destroy','SubscriptController@destroy')->name('admin.subscript.delete');
            Route::get('subscript/{id}','SubscriptController@show')->name('admin.subscript.show');
            Route::get('answerview/{id}','SubscriptController@answerview')->name('admain.subscript.answerview');
            Route::post('store','SubscriptController@store')->name('admain.subscript.store');

          });
           //##################### end subscript ######################//



    
});

















################################# Auth Admin ###############################


//Route::group(['namespace' => 'Admin'], function () {

    Route::get('login', [LoginController::class,'getLogin'])->name('get.admin.login');
 
    Route::post('getlogin', [LoginController::class,'Login'])->name('admin.login');
 
    Route::post('logout', [LoginController::class ,'logout'])->name('admin.logout');
// });
 
 ############################ end Auth Admin  #################
 