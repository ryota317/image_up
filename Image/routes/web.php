<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


Route::get('/image-upload', function () {
    return view('image-upload');
});



Route::get('/top', function () {
    return view('top');
});


 Route::post('/home', 'ImageController@image_upload');
// Route::post('test', 'ImageController@image_get');

Route::get('/test', function () {
    return view('test');
});



 Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/search_result', 'ImageController@image_search');

Route::get('/user-info', 'UserController@get_user_info');

Route::get('/image-info-edit', 'ImageController@image_edit');


