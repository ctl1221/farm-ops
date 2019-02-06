<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{

    public function input_feeds()
    {
    	return view('calculators.feeds');
    }

    public function calculate_feeds(Request $request)
    {

    	$test = ['charles'];
    	$quantity_started_edited = array_reverse($request->quantity_started);

    	return compact('quantity_started_edited','test');
    }
}
