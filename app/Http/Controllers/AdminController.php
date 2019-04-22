<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function me()
    {
        return response()->json(auth('admins')->user());
    }
}
