<?php

namespace App\Http\Controllers;

use App\PaySlip;
use App\Payroll;
use App\Employee;
use Illuminate\Http\Request;

class PaySlipController extends Controller
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
        $payroll = Payroll::find($request->payroll_id);

        $employee = Employee::find($request->employee_id);
        $amount = ($employee->job->daily_salary + $employee->job->daily_allowance) * ($payroll->n_days - $request->days_absent);

        PaySlip::create([
            'payroll_id' => $request->payroll_id,
            'employee_id' => $request->employee_id,
            'amount' => $amount,
            'reference' => $request->reference,
            'days_absent' => $request->days_absent,
        ]);

        return back();
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
