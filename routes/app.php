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
//Route::get('cmd/{token}','App\CmdController@start')->name('app.cmd.start');
//Route::get('cmd/login','App\CmdController@login')->name('app.cmd.login');


Route::get('/', function () {
    return view('app.welcome');
})->name('app.welcome');

Route::get('/', 'App\ShowController@main')->name('app.main');
Route::get('search', 'App\ShowController@search')->name('app.search');
Route::get('login', 'App\ShowController@login')->name('app.login');
Route::get('gig/{freelancer}', 'App\ShowController@freelancer')->name('app.freelancer');
Route::get('product/{product}', 'App\ShowController@product')->name('app.product');
Route::get('category/{category}', 'App\ShowController@category')->name('app.category');

Route::get('orders/{user}', 'App\ShowController@order')->name('app.orders');
Route::get('favorites/{user}', 'App\ShowController@favorites')->name('app.favorites');
//Route::get('requests/{user}', 'App\ShowController@requesets')->name('app.requests');
//Route::get('postRequest/{user}', 'App\ShowController@requesets')->name('app.postRequest');

Route::get('cart/{product}', 'App\ShowController@cart')->name('app.cart');

Route::get('thank/{order}', 'App\ShowController@afterPay')->name('app.thank');
Route::get('logout', 'App\ShowController@logout')->name('app.logout');

Route::post('sign', 'App\LoginController@signIn')->name('app.sign');

Route::post('contact/{freelancer}', 'App\ContactController@send')->name('app.contact');
///cart order
Route::post('cart/quick/{product}', 'App\CartController@quick')->name('app.cart.quick');
Route::post('cart/add/{product}', 'App\CartController@add')->name('app.cart.add');
Route::post('cart/pay/{product}', 'App\CartController@pay')->name('app.cart.pay');
