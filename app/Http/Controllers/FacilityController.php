<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function __invoke()
    {
        $facilities = Facility::all();
        return view('facility', compact('facilities'));

    }
}
