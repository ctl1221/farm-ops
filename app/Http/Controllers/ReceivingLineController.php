<?php

namespace App\Http\Controllers;

use App\ReceivingLine;
use Illuminate\Http\Request;

class ReceivingLineController extends Controller
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
        ReceivingLine::create([
            'receiving_id' => $request->receiving_id,
            'material_id' => $request->material_id,
            'material_type' => 'App\Feed',
            'batch_no' => $request->batch_no,
            'quantity' => $request->quantity,
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReceivingLine  $receivingLine
     * @return \Illuminate\Http\Response
     */
    public function show(ReceivingLine $receivingLine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReceivingLine  $receivingLine
     * @return \Illuminate\Http\Response
     */
    public function edit(ReceivingLine $receivingLine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReceivingLine  $receivingLine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReceivingLine $receivingLine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReceivingLine  $receivingLine
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReceivingLine $receivingLine)
    {
        //
    }
}
