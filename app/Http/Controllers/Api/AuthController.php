<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function user()
    {
        return \Auth::user();
    }
}
