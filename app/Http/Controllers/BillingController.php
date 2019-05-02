<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Billing;
use App\Company;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $latest_year = Carbon::parse(Billing::orderBy('period_start','desc')->first()->period_start)->year;

        if(!$request->year)

        {
            return redirect('/billings?year=' . $latest_year);
        }

        else
        {
            $selected_year = $request->year;
        }

        $billings = Billing::whereRaw('YEAR(period_start) = ' . $selected_year)->get();
        $billers = Company::where('is_biller',true)->where('is_active',true)->get();
        
        return view('billings.index', compact('billings','selected_year','latest_year','billers'));
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
        $billing = Billing::create([
            'type' => $request->type,
            'period_start' => $request->period_start,
            'supplier_id' => $request->supplier_id,
            'period_end' => $request->period_end,
            'amount' => $request->amount,
        ]);

        $year = Carbon::parse($billing->year)->year;

        return redirect('/billings?year=' . $year);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function show(Billing $billing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function edit(Billing $billing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Billing $billing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Billing $billing)
    {
        //
    }
}
