<?php

namespace App\Http\Controllers;

use App\Building;
use App\Day;
use App\Employee;
use App\Farm;
use App\FeedsConsumption;
use App\Grow;
use App\Mortality;
use App\Receiving;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GrowController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $grows = Grow::all();

        return view('grows.index', compact('grows'));
    }

    public function start()
    {
        return view('grows.start');
    }

    public function create()
    {
        return view('grows.create');
    }

    public function store(Request $request)
    {
        
        $grow = Grow::create($request->all());

        return redirect ('/grows/' . $grow->id);
    }

    public function show(Grow $grow)
    {

        $farm_names = json_encode(config('default.farm_names'));
        $taken_buildings_ids = [];
        foreach($grow->farms as $x)
        {
            foreach($x->buildings as $y)
            {
                array_push($taken_buildings_ids, $y->id);
            }
        }
        $farms = app('App\Http\Controllers\APIController')->getFarmsOfGrow($grow);
        $days_recorded = app('App\Http\Controllers\APIController')->getDaysRecordedOfGrow($grow);

        $buildings = Building::all();

        $taken_buildings_ids = json_encode($taken_buildings_ids);

        $period_start = $grow->loadings->count() ? $grow->loadings->first()->date_dep_hatchery : '';
        $period_end = $grow->harvests->count() ? $grow->harvests->first()->date_dep_hatchery : '';

        //Employee Assignments Section
        $farm_ids = $grow->farms->pluck('id');

        $manager_list = Employee::managers()->get();
        $supervisor_list = Employee::supervisors()->get();
        $caretaker_list = Employee::caretakers()->get();

        return view('grows.show', compact('farms','grow','buildings','taken_buildings_ids','period_start','period_end','farm_names','manager_list','supervisor_list', 'caretaker_list','days_recorded'));
    }

    public function edit(Grow $grow)
    {
        //
    }

    public function update(Request $request, Grow $grow)
    {
        //
    }

    public function destroy(Grow $grow)
    {
        //
    }
}
