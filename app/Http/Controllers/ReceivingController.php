<?php

namespace App\Http\Controllers;

use App\Receiving;
use App\Farm;
use App\Feed;
use Illuminate\Http\Request;

class ReceivingController extends Controller
{
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
        $feeds = Feed::all();

        return view('receivings.per_farm', compact('farm', 'feeds'));
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
        Receiving::create($request->all());

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receiving  $receiving
     * @return \Illuminate\Http\Response
     */
    public function show(Receiving $receiving)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receiving  $receiving
     * @return \Illuminate\Http\Response
     */
    public function edit(Receiving $receiving)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receiving  $receiving
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receiving $receiving)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receiving  $receiving
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receiving $receiving)
    {
        //
    }
}
