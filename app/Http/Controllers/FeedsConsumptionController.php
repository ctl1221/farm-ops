<?php

namespace App\Http\Controllers;

use App\FeedsConsumption;
use Illuminate\Http\Request;

class FeedsConsumptionController extends Controller
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
     * @param  \App\FeedsConsumption  $feedsConsumption
     * @return \Illuminate\Http\Response
     */
    public function show(FeedsConsumption $feedsConsumption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FeedsConsumption  $feedsConsumption
     * @return \Illuminate\Http\Response
     */
    public function edit(FeedsConsumption $feedsConsumption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FeedsConsumption  $feedsConsumption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FeedsConsumption $feedsConsumption)
    {
        $feedsConsumption->quantity = $request->quantity;
        $feedsConsumption->save();

        session()->flash('message', $feedsConsumption->id);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FeedsConsumption  $feedsConsumption
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeedsConsumption $feedsConsumption)
    {
        //
    }
}
