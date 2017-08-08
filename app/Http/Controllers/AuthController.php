<?php

namespace App\Http\Controllers;

class AuthController extends Controller
{
    public function user()
    {
        return \Auth::user();
    }
}
