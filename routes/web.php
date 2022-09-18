<?php

use Illuminate\Support\Facades\Route;



Route::group(['namespace'=>'App\Http\Controllers\Web','prefix'=>'products'], function () {

    Route::get('/{ctegry_id?}', 'ProductWebController@getProduct')->name('product');
});

// Route::get('/', function () {
//     return view('web.product');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';
