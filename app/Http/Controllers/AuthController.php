<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
	public function __construct()
    {
        $this->middleware('jwt', ['except' => ['register', 'login']]);
    }

    public function register(Request $request)
    {
        if($request->category == 'admin') {
            $admin = Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);
            $token = auth()->login($admin);
        } else {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);
            $token = auth()->login($user);
        }
    	
    	return $this->respondWithToken($token);
    }

    public function login(Request $request)
    {
    	$credentials = request([
    		'email',
    		'password'
    	]);

        if($request->category == 'admin') {
            $token = auth('admins')->attempt($credentials);
        } else {
            $token = auth('users')->attempt($credentials);
        }

    	if(!$token) {
    		return response()->json([
    			'error' => 'Unauthorized'
    		], 401);
    	}

    	return $this->respondWithToken($token);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
    	auth()->logout();

    	return response()->json([
    		'message' => 'Successfully logged out'
    	]);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
    	return response()->json([
    		'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60 
    	]);
    }
}
