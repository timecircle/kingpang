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

Route::get('clear','CartController@clear')->name('cart.clear');
Route::get('end/{order}','CartController@end')->name('cart.end');

Route::get('{product}','CartController@show')->name('cart.show');

Route::post('add/{product}','CartController@add')->name('cart.add');
Route::post('pay/{cart}','CartController@pay')->name('cart.pay');

//Route::post('quick/{product}','CartController@quick')->name('cart.quick');
