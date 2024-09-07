<?php

use App\Http\Controllers\Web\MailController;
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
Route::group(['namespace'=>'App\Http\Controllers\Web'],function() {


Route::get('/{category_id?}','ProductWebController@getProduct')->name('all')->middleware('traffic');

//////////////////////////////////////////////////////////////////////////////////
Route::group(['prefix'=>'product'],function() {
    Route::get('home/','ProductWebController@index')->name('home');
    Route::get('/{category_id?}','ProductWebController@getProduct')->name('product');
    Route::get('detail-product/{id}','ProductWebController@show')->name('detail_product');
});

//////////////////////////////////////////////////////////////////////////////

Route::group(['prefix'=>'cook'],function() {

    Route::get('cooks','CookWebController@getallcooks')->name('cooks');
    Route::get('detail-cook/{id}','CookWebController@show')->name('detail_cook');
});

//////////////////////////////////////////////////////////////////////////////
Route::group(['prefix'=>'contact-us'],function() {
    //Route::get('contact-us','ProductWebController@getContact')->name('contact');
    
  });
    Route::resource('contact-us','ContactWebController', [
        'names' => [
            'index' => 'contact-us',
            'create' => 'contact-us.create',
            'store' => 'contact-us.store',
            'edit' => 'contact-us.edit',  
            'update' => 'contact-us.update',
            'destroy' => 'contact-us.delete',
        ]
  
        ])->only(['create','store']);

      
  ////////////////////////////////////////////////////////////////////////////////    
  Route::group(['prefix'=>'article'],function() {
    Route::get('articles/','ArticalWebController@getArticle')->name('article');
    });





});  



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';
