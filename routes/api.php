<?php

use Illuminate\Http\Request;

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

Route::post('auth', 'Api\ApiAuthController@authenticate');

Route::post('register', 'Api\ApiAuthController@register');

Route::group(['middleware' => 'auth:api'], function() {
Route::post('post', 'Api\ApiPostsController@store');
});