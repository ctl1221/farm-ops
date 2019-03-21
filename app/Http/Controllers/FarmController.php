<?php

namespace App\Http\Controllers;

use App\Farm;
use Illuminate\Http\Request;

class FarmController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Request $request)
    {
        Farm::create(request()->all()); 
        
        return back();
    }
}
