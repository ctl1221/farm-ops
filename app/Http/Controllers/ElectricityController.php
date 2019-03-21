<?php

namespace App\Http\Controllers;

use App\Electricity;
use Illuminate\Http\Request;

class ElectricityController extends Controller
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
     * @param  \App\Electricity  $electricity
     * @return \Illuminate\Http\Response
     */
    public function show(Electricity $electricity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Electricity  $electricity
     * @return \Illuminate\Http\Response
     */
    public function edit(Electricity $electricity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Electricity  $electricity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Electricity $electricity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Electricity  $electricity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Electricity $electricity)
    {
        //
    }
}
