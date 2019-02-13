<?php

namespace App\Http\Controllers;

use App\Building;
use App\Farm;
use App\Grow;
use App\Day;
use App\Mortality;
use App\FeedsConsumption;
use App\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GrowController extends Controller
{
    public function index()
    {
        $grows = Grow::all();

        return view('grows.index', compact('grows'));
    }

    public function start()
    {
        return view('grows.start');
    }

    public function scaffoldCreate(Request $request)
    {
        $new_grow = Grow::create([
            'cycle' => $request->cycle,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end
        ]);

        for($i=0; $i < config('default.n_farms'); $i++)
        {
            $new_farm = Farm::create([
                'name' => config('default.farm_names')[$i],
                'grow_id' => $new_grow->id
            ]);

            for($j=0; $j < count(config('default.building_assignments')[$i]); $j++)
            {
                $new_farm->buildings()->attach(config('default.building_assignments')[$i][$j]);

                for($k=0; $k < config('default.n_days'); $k++)
                {

                    $new_day = Day::create([
                        'farm_id' => $new_farm->id,
                        'building_id' => config('default.building_assignments')[$i][$j],
                        'day' => $k + 1,
                    ]);

                    $current_building = Building::find(config('default.building_assignments')[$i][$j]);

                    foreach ($current_building->pens as $pen) {
                        Mortality::create([
                            'day_id' => $new_day->id,
                            'pen_id' => $pen->id,
                            'midday' => 'am',
                        ]);
                    }

                    foreach ($current_building->pens as $pen) {
                        Mortality::create([
                            'day_id' => $new_day->id,
                            'pen_id' => $pen->id,
                            'midday' => 'pm',
                        ]);
                    }

                    FeedsConsumption::create(['day_id' => $new_day->id]);
                }
            }
        }

        return redirect('/grows');
    }

    public function create()
    {
        return view('grows.create');
    }

    public function store(Request $request)
    {
        
        $grow = Grow::create([
            'cycle' => $request->cycle,
        ]);

        return redirect ('/grows/' . $grow->id);
    }

    public function show(Grow $grow)
    {
        $farm_names = config('default.farm_names');
        $taken_buildings = [];
        foreach($grow->farms as $x)
        {
            foreach($x->buildings as $y)
            {
                array_push($taken_buildings, $y->id);
            }
        }

        $farms = Farm::where('grow_id',$grow->id)->get();
        $buildings = Building::all();

        $period_start = $grow->loadings->count() ? $grow->loadings->first()->date : '';
        $period_end = $grow->harvests->count() ? $grow->harvests->first()->date : '';

        $supervisor_list = Employee::supervisors()->get();
        $caretaker_list = Employee::caretakers()->get();
        
        return view('grows.show', compact('farms','grow','buildings','taken_buildings','period_start','period_end','farm_names','supervisor_list', 'caretaker_list'));
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

    public function createFarm()
    {
        Farm::create(request()->all()); 
        
        return back();
    }
}
