<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function show($slug)
    {
        $post = Post::where('slug', '=', $slug)->first();
        $posts = Post::take(3)->get();
        return view('news', compact('post', 'posts'));
    }
}
