<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    
    'middleware' => 'api',
    'prefix' => 'auth',
    'namespace' => 'Auth'], 

function($router){

    Route::post('register', 'RegisterController');
    Route::post('regenerate-otp', 'RegenerateOtpCodeController');
    Route::post('login', 'LoginController');
    Route::post('verification', 'VerificationController');
    Route::post('update-password', 'UpdatePasswordController');

});
        
Route::group([
    'middleware' => ['api', 'verifyEmail', 'auth:api'],
], function(){

    Route::get('profile/show', 'ProfileController@show');
    Route::post('profile/update', 'ProfileController@update');

});