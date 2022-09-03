<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;

class SiteController extends Controller
{
    public function home(): View
    {
        Log::info('this is a log', ['test context']);
        return view('home');
    }

    public function test(): View
    {
        return view('test');
    }
}
