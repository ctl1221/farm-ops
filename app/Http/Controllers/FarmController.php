<?php

namespace App\Http\Controllers;

use App\Farm;
use Illuminate\Http\Request;

class FarmController extends Controller
{
    public function store(Request $request)
    {
        Farm::create(request()->all()); 
        
        return back();
    }
}
