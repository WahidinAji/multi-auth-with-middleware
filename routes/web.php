<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('welcome');
});
Route::namespace('Auth')->group(function () {
    Route::get('/', 'LoginController@index')->name('login.index');
    Route::post('post-login', 'LoginController@login')->name('post.login');
    Route::get('logout', 'LoginController@logout')->name('logout');
});
Route::middleware('user')->group(function(){
    Route::get('user-normal','UserController@index')->name('user.index');
});
Route::middleware('admin')->group(function(){
    Route::get('admin-normal','AdminController@index')->name('admin.index');
    Route::get('admin-normal/{admin}','AdminController@edit')->name('admin.edit');
    Route::put('admin-normal/{admin}','AdminController@update')->name('admin.update');
});
