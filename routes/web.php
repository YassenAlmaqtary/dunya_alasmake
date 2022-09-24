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
    
    Route::get('product/{category_id?}','ProductWebController@getProduct')->name('product');
    Route::get('detail-product/{id}','ProductWebController@show')->name('detail');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';
