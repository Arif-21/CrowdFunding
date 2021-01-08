<?php

use Illuminate\Support\Facades\Route;

Route::group([
    
    'middleware' => 'api',
    'prefix' => 'auth',
    'namespace' => 'Auth'], 

function($router){

    Route::post('register', 'RegisterController');
    Route::post('regenerate-otp', 'RegenerateOtpCodeController')->name('regenerate-otp');
    Route::post('login', 'LoginController');
    Route::post('verification', 'VerificationController');
    Route::post('update-password', 'UpdatePasswordController');
    Route::post('logout', 'LogoutController')->middleware('auth:api');
    Route::post('check-token', 'CheckTokenController')->middleware('auth:api');

    //Route socialite (google, facebook, instagram , dll)
    Route::get('social/{provider}', 'SocialiteController@redirectToProvider');
    Route::get('social/{provider}/callback', 'SocialiteController@handleProviderCallback');

});
        
Route::group([
    'middleware' => ['api', 'verifyEmail', 'auth:api'],
], function(){

    Route::get('profile/show', 'ProfileController@show');
    Route::post('profile/update', 'ProfileController@update');

});

Route::group([
    'middleware'    => 'api',
    'prefix'        => 'campaign',
], function(){
    
    Route::get('random/{count}', 'CampaignController@random');
    Route::post('store', 'CampaignController@store');
    Route::get('/', 'CampaignController@index');
    Route::get('/{id}', 'CampaignController@detail');
    Route::get('search/{keyword}', 'CampaignController@search');

});

Route::group([
    'middleware'    => 'api',
    'prefix'        => 'blog',
], function(){
    
    Route::get('random/{count}', 'BlogController@random');
    Route::post('store', 'BlogController@store');
    Route::get('/', 'BlogController@index');
    Route::get('/{id}', 'BlogController@detail');

});