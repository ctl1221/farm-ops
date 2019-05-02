<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\PaySlip;
use App\Employee;
use Illuminate\Http\Request;

class PaySlipController extends Controller
{
   
   public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {

        $latest_date = Carbon::parse(Payslip::orderBy('period_start','desc')->first()->period_start);
        $latest_year = $latest_date->year;
        $latest_month = $latest_date->month;

        if(!$request->year || !$request->month)

        {
            return redirect('/payslips?year=' . $latest_year . '&month=' . $latest_month);
        }

        else
        {
            $selected_year = $request->year;
            $selected_month = $request->month;
        }

        $employees_list = Employee::all();

        return view ('payslips.index', compact('employees_list','latest_year','latest_month','selected_year','selected_month'));
    }

    public function create()
    {
        //
    }

 
    public function store(Request $request)
    {
        PaySlip::create([
            'employee_id' => $request->employee_id,
            'amount' => $request->amount,
            'reference' => $request->reference,
            'date_bill' => $request->date_bill,
            'period_start' => $request->period_start,
            'period_end' => $request->period_end,
        ]);

        return ['year' => Carbon::parse($request->period_start)->year, 'month' => Carbon::parse($request->period_start)->month];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PaySlip  $paySlip
     * @return \Illuminate\Http\Response
     */
    public function show(PaySlip $paySlip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaySlip  $paySlip
     * @return \Illuminate\Http\Response
     */
    public function edit(PaySlip $paySlip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaySlip  $paySlip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaySlip $paySlip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaySlip  $paySlip
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaySlip $paySlip)
    {
        //
    }
}
