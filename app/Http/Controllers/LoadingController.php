<?php

namespace App\Http\Controllers;

//use App\Events\LoadingCreated;
use App\Farm;
use App\Loading;
use Illuminate\Http\Request;

class LoadingController extends Controller
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
        $loadings = Loading::where('farm_id', '=', $farm->id)->orderBy('date')->get();

        return view('loadings.per_farm', compact('loadings', 'farm'));
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
        Loading::create([
            'farm_id' => $request->farm_id,
            'date' => $request->date,
            'hatchery_source' => $request->hatchery_source,
            'total_delivered' => $request->total_delivered,
            'doa' => $request->doa,
            'net_received' => $request->net_received,
            'truck_plate_no' => $request->truck_plate_no,
            'trucker_name' => $request->trucker_name,
            'dep_hatchery' => $request->dep_hatchery,
            'arr_farm' => $request->arr_farm,
            'dep_farm' => $request->dep_farm,
            'source_id' => $request->source_id,
            'seal_no' => $request->seal_no,
            'notes' => htmlspecialchars($request->notes),
        ]);

        return 'success';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Loading  $loading
     * @return \Illuminate\Http\Response
     */
    public function show(Loading $loading)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Loading  $loading
     * @return \Illuminate\Http\Response
     */
    public function edit(Loading $loading)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Loading  $loading
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loading $loading)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Loading  $loading
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loading $loading)
    {
        //
    }
}
