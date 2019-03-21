<?php

namespace App\Http\Controllers;

use App\UtilityBill;
use App\Electricity;
use App\Company;
use Illuminate\Http\Request;

class UtilityBillController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $utility_bills = UtilityBill::orderBy('period_start','asc')->get();

        return view ('utility_bills.index', compact('utility_bills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Company::where('is_supplier', true)->get();

        return view ('utility_bills.create', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $current_utility = Electricity::create([
            'kwh' => $request->kwh,
        ]);

        UtilityBill::create([
            'period_start' => $request->period_start,
            'period_end' => $request->period_end,
            'utility_id' => $current_utility->id,
            'utility_type' => 'App\Electricity',
            'supplier_id' => $request->supplier_id,
            'amount' => $request->amount,        
        ]);

        return redirect('/utilityBills');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UtilityBill  $utilityBill
     * @return \Illuminate\Http\Response
     */
    public function show(UtilityBill $utilityBill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UtilityBill  $utilityBill
     * @return \Illuminate\Http\Response
     */
    public function edit(UtilityBill $utilityBill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UtilityBill  $utilityBill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UtilityBill $utilityBill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UtilityBill  $utilityBill
     * @return \Illuminate\Http\Response
     */
    public function destroy(UtilityBill $utilityBill)
    {
        //
    }
}
