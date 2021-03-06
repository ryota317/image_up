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
Route::post('/image-change-title', 'ImageController@image_change_title');

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


Route::post('/delete-image', 'ImageController@image_delete');

Route::get('/user_name_change', function () {
    return view('user_name_change');
});
Route::get('/user_email_change', function () {
    return view('user_email_change');
});


Route::post('/user_name_change', 'UserController@user_name_change');
Route::post('/user_email_change', 'UserController@user_email_change');


