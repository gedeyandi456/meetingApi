<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function demo()
    {
        return response()->json(['message' => 'demo admin'], 200);
    }
}
