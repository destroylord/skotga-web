<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function __invoke()
    {
        $galleries = Gallery::all();
        return view('gallery', compact('galleries'));
    }
}
