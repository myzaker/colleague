<?php

namespace App\Http\Controllers;

use Identicon\Identicon;

class FrontController extends Controller
{
    public function spa()
    {
        return view('app');
    }

    public function identicon($string)
    {
        return (new Identicon)->getImageData($string, 128, null, 'f0f0f0');
    }
}
