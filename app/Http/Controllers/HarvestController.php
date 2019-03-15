<?php

namespace App\Http\Controllers;

use App\Harvest;
use App\Farm;
use App\Company;
use App\TruckWeighing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HarvestController extends Controller
{
    public function per_farm(Farm $farm)
    {

        $alw_rates = DB::table('ALW_rates')->get();

        return view('harvests.per_farm', compact('farm','alw_rates'));
    }

    public function store(Request $request)
    {
        $harvest = Harvest::create([
        	'farm_id' => $request->farm_id,
        	'date' => $request->date,
        	'dressing_plant' => $request->dressing_plant,
        	'control_no' => $request->control_no,
        	'coops_per_truck' => $request->coops_per_truck,
        	'truck_plate_no' => strtoupper($request->truck_plate_no),
        	'total_harvested' => $request->total_harvested,
            'alw_rate' => 1.00
        ]);

        $dressing_plant = Company::where('name', $request->dressing_plant)->count();

        if(!$dressing_plant)
        {
            Company::create([
                'name' => $request->dressing_plant,
                'is_dressing_plant' => true 
            ]);
        }

        if($request->ticket_no && $request->kg_net_weight)
        {
            TruckWeighing::create([
                'ticket_no' => $request->ticket_no,
                'kg_net_weight' => $request->kg_net_weight,
                'activity_type' => 'App\\Harvest',
                'activity_id' => $harvest->id
            ]);
        }

        return back();
    }

}
