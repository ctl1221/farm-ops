<?php

namespace App\Http\Controllers;

use App\TruckWeighing;
use Illuminate\Http\Request;

class TruckWeighingController extends Controller
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
        TruckWeighing::create([
            'activity_type' => $request->activity_type,
            'activity_id' => $request->activity_id,
            'kg_net_weight' => $request->kg_net_weight,
            'ticket_no' => $request->ticket_no
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TruckWeghing  $truckWeghing
     * @return \Illuminate\Http\Response
     */
    public function show(TruckWeighing $truckWeighing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TruckWeghing  $truckWeghing
     * @return \Illuminate\Http\Response
     */
    public function edit(TruckWeighing $truckWeighing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TruckWeghing  $truckWeghing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TruckWeighing $truckWeighing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TruckWeghing  $truckWeghing
     * @return \Illuminate\Http\Response
     */
    public function destroy(TruckWeighing $truckWeighing)
    {
        //
    }
}
