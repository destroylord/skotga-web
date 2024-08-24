<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $home = Home::first();
        return view('welcome', compact('home'));
    }
}
