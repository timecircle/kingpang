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


Auth::routes();

Route::post('login/firebase', 'Auth\FirebaseController@login')->name('firebase.login');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

//Route::group(['middleware' => 'auth'], function () {
//});

/*
  Route::get('orders', 'Auth\ShowController@order')->name('auth.orders');
  Route::post('orders/search', 'Auth\ShowController@orderSearch')->name('auth.order.search');

  Route::get('favorites', 'Auth\ShowController@favorites')->name('auth.favorites');
  Route::get('comments', 'Auth\ShowController@favorites')->name('auth.comments');
  Route::get('notifies', 'Auth\ShowController@notify')->name('auth.notifies');
  Route::get('rewards', 'Auth\ShowController@reward')->name('auth.rewards');
  Route::get('changepass', 'Auth\ShowController@info')->name('auth.changepass');
  Route::get('info', 'Auth\ShowController@info')->name('auth.info');
  Route::get('join', 'Auth\ShowController@join')->name('auth.join');

 */

Route::get('{user}/orders', 'Auth\PageController@order')->name('auth.orders');
Route::get('{user}/favorites', 'Auth\PageController@favorites')->name('auth.favorites');
Route::get('{user}/comments', 'Auth\PageController@favorites')->name('auth.comments');
Route::get('{user}/notifies', 'Auth\PageController@notify')->name('auth.notifies');

Route::get('{user}/chat', 'Auth\PageController@notify')->name('auth.chat');

Route::get('{user}/rewards', 'Auth\PageController@reward')->name('auth.rewards');
Route::get('{user}/tranactions', 'Auth\PageController@transactions')->name('auth.tranactions');
Route::get('{user}/settings', 'Auth\PageController@setting')->name('auth.settings');


Route::get('{user}/join', 'Auth\PageController@join')->name('auth.join');

Route::post('order/quick/{product}', 'Auth\OrderController@quick')->name('auth.order.quick');
Route::put('order/pay/{order}', 'Auth\OrderController@pay')->name('auth.order.pay');
Route::put('order/request/{order}', 'Auth\OrderController@request')->name('auth.order.request');
Route::get('order/{case}/{order}', 'Auth\OrderController@case')->name('auth.order.case');
