<?php

namespace App\Http\Controllers;

use App\Farm;
use App\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeliveryController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function per_farm(Farm $farm)
    {

    	$weighing_treshold = json_encode(config('default.delayed_plant_weighing_treshold'));
    	$weighing_multiplier = json_encode(config('default.delayed_plant_weighing_pct'));

    	$alw_rates = DB::table('ALW_rates')->get();

        return view('deliveries.per_farm', compact('farm','weighing_treshold','weighing_multiplier','alw_rates'));
    }

    public function store(Request $request)
    {
    	Delivery::create([
    		'harvest_id' => $request->harvest_id,
    		'shift' => $request->shift,
    		'time_in_plant' => $request->time_in_plant,
    		'time_weighed_plant' => $request->time_weighed_plant,
    		'kg_plant_net_weight' => $request->kg_plant_net_weight,
    		'kg_plant_feeds_in_crop' => $request->kg_plant_feeds_in_crop,
    		'kg_adjusted_net_weight' => $request->kg_adjusted_net_weight,
    		'alw_rate' => $request->alw_rate,
    	]);

    	return back();
    }
}
