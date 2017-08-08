<?php

namespace App\Http\Controllers;

class AuthController extends Controller
{
    public function user()
    {
        return [
            'user' => \Auth::user(),
        ];
    }

    public function admin()
    {
        return [
            'is_admin' => \Auth::user()->is_admin,
        ];
    }
}
