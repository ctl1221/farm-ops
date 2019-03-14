<?php

namespace App\Http\Controllers;

use App\Harvest;
use App\Farm;
use App\Company;
use Illuminate\Http\Request;

class HarvestController extends Controller
{
    public function per_farm(Farm $farm)
    {
        return view('harvests.per_farm', compact('farm'));
    }

    public function store(Request $request)
    {
        Harvest::create([
        	'farm_id' => $request->farm_id,
        	'date' => $request->date,
        	'dressing_plant' => $request->dressing_plant,
        	'control_no' => $request->control_no,
        	'coops_per_truck' => $request->coops_per_truck,
        	'truck_plate_no' => strtoupper($request->truck_plate_no),
        	'total_harvested' => $request->total_harvested,
        ]);

        $dressing_plant = Company::where('name', $request->dressing_plant)->count();

        if(!$dressing_plant)
        {
            Company::create([
                'name' => $request->dressing_plant,
                'is_dressing_plant' => true 
            ]);
        }

        return back();
    }

}
