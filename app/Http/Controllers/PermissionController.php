<?php

namespace App\Http\Controllers;

class PermissionController extends Controller
{
    public function isAdmin()
    {
        return [
            'is_admin' => \Auth::user()->is_admin,
        ];
    }
}
