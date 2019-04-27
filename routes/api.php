<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group([
    'middleware' => 'cors',
    'prefix' => 'auth'
], function() {
	Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});


Route::group(['prefix' => 'admin','middleware' => ['assign.guard:admins','jwt']], function ()
{
	Route::get('/me','AdminController@me');	
});

Route::group(['prefix' => 'user','middleware' => ['assign.guard:users','jwt']], function ()
{
	Route::get('/me','UserController@me');	
});