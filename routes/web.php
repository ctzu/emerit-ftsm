<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function() {
Route::get('/home', 'HomeController@index');

//posts
Route::get('/post', 'PostsController@index');
Route::get('/post/create', 'PostsController@create');
Route::post('/post', 'PostsController@store');
Route::get('/post/{post}', 'PostsController@show');
Route::get('/post/{post}/edit', 'PostsController@edit');
Route::patch('/post/{post}', 'PostsController@update');
Route::delete('/post/{post}/delete', 'PostsController@destroy');

// Route::resource('post','PostsController');
Route::post('/post/{post}/like', 'LikesController@likesAction');

// aktivitis
Route::get('/aktiviti', 'AktivitisController@index');
Route::get('/aktiviti/create', 'AktivitisController@create');
Route::post('/aktiviti', 'AktivitisController@store');
Route::get('/aktiviti/{aktiviti}/edit', 'AktivitisController@edit');
Route::patch('/aktiviti/{aktiviti}', 'AktivitisController@update');
Route::patch('/aktiviti/{aktiviti)/completed', 'AktivitisController@completed');
Route::delete('/aktiviti/images/{id}', ['as'=>'aktiviti.destroyImage','uses'=>'AktivitisController@destroyImage']);
Route::delete('/aktiviti/{aktiviti}/delete', 'AktivitisController@destroy');
// Route::post('/upload', 'AktivitisController@upload');

// hebahans
Route::get('/hebahan', 'HebahansController@index');
Route::get('/hebahan/create', 'HebahansController@create');
Route::post('/hebahan', 'HebahansController@store');
Route::get('/hebahan/{hebahan}', 'HebahansController@show');
Route::get('/hebahan/{hebahan}/edit', 'HebahansController@edit');
Route::patch('/hebahan/{hebahan}', 'HebahansController@update');
Route::delete('/hebahan/{hebahan}/delete', 'HebahansController@destroy');

//papar buletin
Route::get('/papar', 'HebahansController@papar');
Route::get('/papar/{papar}', 'HebahansController@show');
// Route::get('/papar/{papar}/show', 'HebahansController@show');

//detailbuletin
Route::get('/detail', 'HebahansController@detail');
Route::get('/detail/{detail}', 'HebahansController@show');

});

Auth::routes();

