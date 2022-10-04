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

Route::group(['prefix'=>'products','namespace'=>'App\Http\Controllers\Web'],function() {
    
    Route::get('product/{category_id?}','ProductWebController@getProduct')->name('product')->middleware('traffic');
    Route::get('detail-product/{id}','ProductWebController@show')->name('detail');
    Route::get('article','ProductWebController@article')->name('article');
    Route::get('contact-us','ProductWebController@getContact')->name('contact');
    Route::resource('contact-us','ContactController', [
        'names' => [
            'index' => 'contact-us',
            'create' => 'contact-us.create',
            'store' => 'contact-us.store',
            'edit' => 'contact-us.edit',
            'update' => 'contact-us.update',
            //'destroy' => 'contact-us.delete',
            
            ]      
      ]);


});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';
