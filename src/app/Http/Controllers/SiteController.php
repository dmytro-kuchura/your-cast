<?php

namespace App\Http\Controllers;

class SiteController extends Controller
{
    public function home()
    {
        return view('welcome');
    }

    public function test()
    {
        return view('test');
    }
}
