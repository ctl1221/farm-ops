<?php

namespace App\Http\Controllers;

use App\Harvest;
use App\Farm;
use Illuminate\Http\Request;

class HarvestController extends Controller
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
      public function per_farm(Farm $farm)
    {
        $harvests = Harvest::where('farm_id', '=', $farm->id)->get();

        return view('harvests.per_farm', compact('harvests', 'farm'));
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
        Harvest::create($request->all());

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Harvest  $harvest
     * @return \Illuminate\Http\Response
     */
    public function show(Harvest $harvest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Harvest  $harvest
     * @return \Illuminate\Http\Response
     */
    public function edit(Harvest $harvest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Harvest  $harvest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Harvest $harvest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Harvest  $harvest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Harvest $harvest)
    {
        //
    }
}
