<?php

namespace App\Http\Controllers;

use App\Mortality;
use App\Farm;
use App\Building;
use App\Day;
use Illuminate\Http\Request;

class MortalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function per_building(Farm $farm, Building $building)
    {
        $current_days = Day::where([
            ['farm_id', '=', $farm->id],
            ['building_id', '=', $building->id],
        ])->get();

        return view ('mortalities.per_building', compact ('current_days'));
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
        Mortality::create($request->all());

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mortality  $mortality
     * @return \Illuminate\Http\Response
     */
    public function show(Mortality $mortality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mortality  $mortality
     * @return \Illuminate\Http\Response
     */
    public function edit(Mortality $mortality)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mortality  $mortality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mortality $mortality)
    {
        $mortality->quantity = $request->quantity;
        $mortality->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mortality  $mortality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mortality $mortality)
    {
        //
    }
}
