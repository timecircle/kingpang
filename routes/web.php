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
/****Mobile Screen */
Route::get('/m','Web\MobileController@home')->name('home');

/****Show Page*****/
Route::get('/','Web\PageController@home')->name('home');
Route::get('/king','Web\PageController@king')->name('king');
Route::get('/{pretty}','Web\PageController@page')->name('page');




/*
Route::get('chat',function(){
    return view('page.chat');
})->name('chat');
Route::get('/{type}/{category}','ShowController@category')->name('category');
Route::get('/{type}/{category}/{post}','ShowController@post')->name('post');
*/