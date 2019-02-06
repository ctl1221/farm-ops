<?php

namespace App\Http\Controllers;

use App\Events\LoadingCreated;
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
        $loading = Loading::create($request->all());

        return back();
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
