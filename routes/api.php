<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('access', 'Apis\AppController@access');
Route::post('login', 'Apis\AppController@login');

Route::group([
  'middleware' => 'auth:api'
], function() {
    Route::get('logout', 'Apis\AuthController@logout');
    Route::get('user', 'Apis\AuthController@user');
});
