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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'Admin\UsersController@profile')->name('profile');
Route::post('/profile', 'Admin\UsersController@update_avatar');
Route::group(['middleware' => ['web', 'auth','admin']], function () {
    Route::resource('manufacturers', 'ManufacturersController');
    Route::resource('phones', 'PhonesController');
    Route::resource('admin/users', 'Admin\UsersController');
});
