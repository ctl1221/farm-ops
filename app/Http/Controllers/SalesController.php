<?php

namespace App\Http\Controllers;

use App\Farm;
use App\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
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
    public function create(Farm $farm)
    {
        $fcr_rates = DB::table('FCR_rates')->get();
        $hr_rates = DB::table('HR_rates')->get();
        $bpi_rates = DB::table('BPI_rates')->get();
        $fcri_rates = DB::table('FCRi_rates')->get();
    
        return view('sales.create', compact('farm', 'fcr_rates', 'hr_rates', 'bpi_rates', 'fcri_rates'));
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
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show(Sales $sales)
    {
        //Hard Coding
        $farm = Farm::find(1);
        //
        $feeds_breakdown = DB::table('receiving_lines as first')
            ->join('feeds as third','third.id','=','first.material_id' )
            ->join('receivings as second','second.id','=','first.receiving_id' )
            ->select(DB::raw('third.description, sum(quantity) as total'))
            ->where('first.material_type','App\\Feed')
            ->where('second.farm_id',$farm->id)
            ->groupBy('third.description')->get();

        $quantity_started = $farm->buildings->reduce(function ($carry, $value){
            return $carry += $value->pivot->birds_started;
        });

        return view('sales.show', compact('farm', 'quantity_started','feeds_breakdown'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit(Sales $sales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sales $sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sales $sales)
    {
        //
    }
}
