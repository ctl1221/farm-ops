<?php

namespace App\Http\Controllers;

use App\Farm;
use App\Sales;
use App\TruckWeighing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Farm $farm)
    {
        $fcr_rates = DB::table('FCR_rates')->get();
        $hr_rates = DB::table('HR_rates')->get();
        $bpi_rates = DB::table('BPI_rates')->get();
        $fcri_rates = DB::table('FCRi_rates')->get();
    
        return view('sales.create', compact('farm', 'fcr_rates', 'hr_rates', 'bpi_rates', 'fcri_rates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Sales::create([
            'farm_id' => $request->farm_id,
            'pct_hr' => $request->pct_hr,
            'fcr' => $request->fcr,
            'alw' => $request->alw,
            'bpi' => $request->bpi,
            'age' => $request->age,
            'gross_birds_received' => $request->gross_birds_received,
            'birds_adjustment' => $request->birds_adjustment,
            'net_birds_received' => $request->net_birds_received,
            'birds_harvested' => $request->birds_harvested,
            'gross_weight' => $request->gross_weight,
            'staging_adjustment' => $request->staging_adjustment,
            'net_weight' => $request->net_weight,
            'feed_in_crop' => $request->feed_in_crop,
            'IBFP' => $request->IBFP,
            'IBGP' => $request->IBGP,
            'IBSC' => $request->IBSC,
            'ICBC' => $request->ICBC,
            'alw_fee' => $request->alw_fee,
            'fcr_rate' => $request->fcr_rate,
            'hr_rate' => $request->hr_rate,
            'bpi_rate' => $request->bpi_rate,
            'fcri_rate' => $request->fcri_rate,
            'class_a_fee' => $request->class_a_fee,
            'growing_defectives_rate' => $request->growing_defectives_rate,
            'hauling_defectives_rate' => $request->hauling_defectives_rate,
            'lpg_rate' => $request->lpg_rate,
            'incentive_1_rate' => $request->incentive_1_rate,
            'incentive_2_rate' => $request->incentive_2_rate,
            'power_subsidy' => $request->power_subsidy,
            'vetmed_disinfectant_rebate' => $request->vetmed_disinfectant_rebate,
            'total_growers_fee' => $request->total_growers_fee,
            'dob_vaccination' => $request->dob_vaccination,
            'depletion' => $request->depletion,
            'fly_charges_rate' => $request->fly_charges_rate,
            'total_chargeable' => $request->total_chargeable,
            'net_growers_fee' => $request->net_growers_fee,
        ]);

        return back();
    }


    public function compare(Farm $farm)
    {

        // $feeds_breakdown = DB::table('receiving_lines as first')
        //     ->join('feeds as third','third.id','=','first.material_id' )
        //     ->join('receivings as second','second.id','=','first.receiving_id' )
        //     ->select(DB::raw('third.description, sum(quantity) as total'))
        //     ->where('first.material_type','App\\Feed')
        //     ->where('second.farm_id',$farm->id)
        //     ->groupBy('third.description')->get();
        
        $quantity_started = $farm->buildings->reduce(function ($carry, $value){
            return $carry += $value->pivot->birds_started;
        });

        $birds_harvested = $farm->harvests->reduce(function ($carry, $value){
            return $carry += $value->total_harvested;
        });

        $birds_weight = $farm->harvests->reduce(function ($carry, $value){
            return $carry += $value->truck_weighings ? $value->truck_weighings[0]->kg_net_weight : 0;
        });

        $alw_fee = $farm->harvests->reduce(function ($carry, $value){
            return $carry += $value->truck_weighings ? $value->truck_weighings[0]->kg_net_weight * $value->alw_rate : 0;
        });

        $alw = $birds_weight / $birds_harvested;

        $pct_hr = $birds_harvested / $quantity_started * 100;

        $hr_rate = DB::table('HR_rates')->where('start', '<=', $pct_hr)->where('end','>=', $pct_hr)->first()->rate;

        $hr_fee = $hr_rate * $birds_harvested;

        $feeds_consumption = $farm->feeds_consumptions->sum('quantity');

        $fcr = ($feeds_consumption * 50) / ($birds_harvested * $alw);

        $fcr_rate = DB::table('FCR_rates')->where('start', '<=', $fcr)->where('end','>=', $fcr)->first()->rate;

        $fcr_fee = $fcr_rate * $birds_harvested;

        $fcri_rate = DB::table('FCRi_rates')->where('start', '<=', $fcr)->where('end','>=', $fcr)->first()->rate;

        $fcri_fee = $fcri_rate * $birds_harvested;

        return view('sales.compare', compact('farm', 'quantity_started','feeds_breakdown', 'birds_harvested', 'birds_weight','alw_fee','alw', 'pct_hr', 'fcr', 'fcr_fee', 'fcri_fee','hr_fee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit(Sales $sales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sales $sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sales $sales)
    {
        //
    }
}
