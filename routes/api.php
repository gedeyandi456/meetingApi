<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::group(['prefix' => 'admin','middleware' => ['assign.guard:admins','api']], function ()
// {
// 	Route::get('/me','AdminController@me');	
// });

// Route::group(['prefix' => 'user','middleware' => ['assign.guard:users','api']], function ()
// {
// 	Route::get('/me','UserController@me');	
// });

Route::group([
    'prefix' => 'auth'
], function ($router) {
	Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});
