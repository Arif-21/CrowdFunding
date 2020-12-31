<?php

use Illuminate\Support\Facades\Route;

Route::view('{any?}', 'app')->where('any', '.*');

// use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::group(['middleware' => ['auth','verifyEmail']], function (){
//     //user yang belum verifikasi 
//     Route::get('/route-1', 'UserController@index');
    
// });

// Route::group(['middleware' => ['auth', 'verifyEmail', 'admin']], function (){

//     Route::get('/route-2', 'AdminController@index');
    
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
