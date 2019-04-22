<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function demo()
    {
        return response()->json(['message' => 'demo user'], 200);
    }
}
