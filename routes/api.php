<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'admin','middleware' => ['assign.guard:admins','jwt.auth']],function ()
{
	Route::get('/demo','AdminController@demo');	
});

Route::group(['prefix' => 'user','middleware' => ['assign.guard:users','jwt.auth']],function ()
{
	Route::get('/demo','UserController@demo');	
});

Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');
