<?php

namespace App\Http\Controllers;

//use App\Events\LoadingCreated;
use App\Farm;
use App\Loading;
use App\Company;
use Illuminate\Http\Request;

class LoadingController extends Controller
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
     public function per_farm(Farm $farm)
    {
        $chick_suppliers = Company::where('is_chick_supplier',true)->get();

        $loadings = Loading::where('farm_id', '=', $farm->id)
            ->orderBy('date_dep_hatchery','desc')
            ->orderBy('time_arr_farm','asc')
            ->get();

        $hatcheries = Company::where('is_hatchery',true)->get();


        return view('loadings.per_farm', compact('loadings', 'farm','chick_suppliers','hatcheries'));
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
        Loading::create([
            'farm_id' => $request->farm_id,
            'company_id' => $request->company_id,
            'date_dep_hatchery' => $request->date_dep_hatchery,
            'hatchery_source' => $request->hatchery_source,
            'total_delivered' => $request->total_delivered,
            'doa_delivered' => $request->doa_delivered,
            'net_delivered' => $request->net_delivered,
            'truck_plate_no' => $request->truck_plate_no,
            'time_arr_farm' => $request->time_arr_farm,
            'notes' => nl2br($request->notes),
        ]);

        $hatchery = Company::where('name',$request->hatchery_source)->count();

        if(!$hatchery)
        {
            Company::create([
                'name' => $request->hatchery_source,
                'is_hatchery' => true 
            ]);
        }

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
