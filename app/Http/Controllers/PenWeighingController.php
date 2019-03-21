<?php

namespace App\Http\Controllers;

use App\PenWeighing;
use Illuminate\Http\Request;

class PenWeighingController extends Controller
{
    
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function update(Request $request, PenWeighing $penWeighing)
    {
        $penWeighing->weight = $request->weight;
        $penWeighing->save();
        
        return back();
    }

}
