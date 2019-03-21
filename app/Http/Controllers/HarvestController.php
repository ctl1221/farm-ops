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
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function per_farm(Farm $farm)
    {
        $d_total_incentive = 0;
        foreach($farm->deliveries as $x)
        {
            $d_total_incentive += $x->alw_rate * $x->kg_adjusted_net_weight;
        }

        $d_weight = $farm->deliveries->sum('kg_adjusted_net_weight');
        $d_total_birds = $farm->harvests->sum('total_harvested');
        $d_total_alw = $d_weight / $d_total_birds;
        $d_total_alw_rate = $d_total_incentive / $d_weight;

        $deliveries_aggregates = json_encode([
            'total_weight' => $d_weight,
            'total_alw' => $d_total_alw,
            'total_alw_rate' =>$d_total_alw_rate,
            'total_alw_incentive' => $d_total_incentive,
        ]);

        $alw_rates = DB::table('ALW_rates')->get();

        return view('harvests.per_farm', compact('farm','alw_rates', 'deliveries_aggregates'));
    }

    public function harvest_weigh(Request $request)
    {
        $harvest = Harvest::find($request->harvest_id);
        $weigh = new TruckWeighing;

        $alw = $request->kg_net_weight / $request->total_harvested;
        $alw_rate = DB::table('ALW_rates')->where('start','<=',$alw)->where('end','>=',$alw)->first()->rate;

        DB::transaction(function () use ($weigh, $harvest, $request, $alw_rate){
            $weigh->kg_net_weight = $request->kg_net_weight;
            $weigh->ticket_no = $request->ticket_no;
            $weigh->activity_type = 'App\\Harvest';
            $weigh->activity_id = $request->harvest_id;
            $weigh->save();

            $harvest->alw_rate = $alw_rate;
            $harvest->save();
        });

        return back();
    }

    public function store(Request $request)
    {

        $dressing_plant = Company::where('name', $request->dressing_plant)->count();
        if(!$dressing_plant)
        {
            Company::create([
                'name' => $request->dressing_plant,
                'is_dressing_plant' => true 
            ]);
        }

        $harvest = Harvest::create([
        	'farm_id' => $request->farm_id,
        	'date' => $request->date,
        	'dressing_plant' => $request->dressing_plant,
        	'control_no' => $request->control_no,
        	'coops_per_truck' => $request->coops_per_truck,
        	'truck_plate_no' => strtoupper($request->truck_plate_no),
        	'total_harvested' => $request->total_harvested,
            'alw_rate' => 0.00
        ]);


        if($request->ticket_no && $request->kg_net_weight)
        {
            $weigh = new TruckWeighing;

            $alw = $request->kg_net_weight / $request->total_harvested;
            $alw_rate = DB::table('ALW_rates')->where('start','<=',$alw)->where('end','>=',$alw)->first()->rate;

            DB::transaction(function () use ($weigh, $harvest, $request, $alw_rate){
                $weigh->kg_net_weight = $request->kg_net_weight;
                $weigh->ticket_no = $request->ticket_no;
                $weigh->activity_type = 'App\\Harvest';
                $weigh->activity_id = $harvest->id;
                $weigh->save();

                $harvest->alw_rate = $alw_rate;
                $harvest->save();
            });
        }

        return back();
    }

}
