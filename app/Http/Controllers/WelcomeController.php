<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Information;
use App\Models\Post;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $home = Home::first();
        $posts = Post::take(3)->get();
        $informations = Information::take(3)->get();
        
        return view('welcome', compact('home', 'posts', 'informations'));
    }
}
