<?php

namespace App\Http\Controllers;

use App\Weighing;
use App\Farm;
use App\Building;
use App\Day;
use Illuminate\Http\Request;

class WeighingController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
    }

    public function per_building(Farm $farm, Building $building)
    {
        $day_array = Day::where([
            ['farm_id', '=', $farm->id],
            ['building_id', '=', $building->id],
        ])->pluck('id');

        //$weighings_ids = Weighing::whereIn('day_id',$day_array)->groupBy('day_id')->pluck('day_id');
        
        //$current_days = Day::whereIn('id',$weighings_ids)->with('weighings')->get();
        $current_weighings = Weighing::whereIn('day_id',$day_array)->with('day','pen_weighings')->get();

        return view ('weighings.per_building', compact ('current_weighings','farm','building'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Weighing  $weighing
     * @return \Illuminate\Http\Response
     */
    public function show(Weighing $weighing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Weighing  $weighing
     * @return \Illuminate\Http\Response
     */
    public function edit(Weighing $weighing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Weighing  $weighing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Weighing $weighing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Weighing  $weighing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Weighing $weighing)
    {
        //
    }
}
