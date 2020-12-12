<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['verifyEmail']], function (){

    Route::get('/route-1', 'UserController@index');

    
});

Route::group(['middleware' => ['auth', 'admin']], function (){

    Route::get('/admin', 'AdminController@index')->name('admin');
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');