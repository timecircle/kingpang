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

Route::get('/', 'Dev\PageController@login')->name('dev.login');
Route::get('index', 'Dev\PageController@index')->name('dev.index');

Route::get('trans/{lang}', 'Dev\LangController@trans')->name('trans');

Route::post('editor/imgupload', 'Dev\EditorController@imgUpload')->name('editor.imgupload');
Route::post('users/{user}/liked', 'Dev\LikeController@liked')->name('liked');

Route::post('search/{model}', 'Dev\SearchController@find')->name('search.find');
Route::post('search/{model}/clear', 'Dev\SearchController@clear')->name('search.clear');

Route::get('pages/index', 'PostController@page')->name('pages.index');
Route::get('products/all', 'ProductController@all')->name('products.all');

Route::get('{prefix}.categories', 'CategoryController@index')->name('categories.prefix');

Route::resources([
  'users'               =>  'UserController',
  'freelancers'         =>  'FreelancerController',
  'blocks'              =>  'BlockController',
  'posts'               =>  'PostController',
  'categories'          =>  'CategoryController',

]);
Route::resource('freelancers.orders', 'OrderController')->shallow();
Route::resource('freelancers.customers', 'CustomerController')->shallow();
Route::resource('freelancers.products', 'ProductController')->shallow();

Route::resource('freelancers.edus', 'FreelancerEduController')->shallow();
Route::resource('freelancers.certs', 'FreelancerCertController')->shallow();
Route::resource('freelancers.expes', 'FreelancerExpeController')->shallow();

