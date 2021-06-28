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

Route::group(['middleware' => 'freelancer'], function() {
    Route::get('/', 'Freelancer\ShowController@index')->name('freelancer.index');
    Route::get('info', 'Freelancer\ShowController@info')->name('freelancer.info');
    Route::get('orders', 'Freelancer\ShowController@orders')->name('freelancer.orders');
    Route::get('products', 'Freelancer\ShowController@products')->name('freelancer.products');
    Route::get('projects', 'Freelancer\ShowController@projects')->name('freelancer.projects');
    Route::get('customers', 'Freelancer\ShowController@customers')->name('freelancer.customers');
});
