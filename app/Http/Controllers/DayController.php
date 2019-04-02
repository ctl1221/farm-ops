<?php

namespace App\Http\Controllers;

use App\Building;
use App\Day;
use App\Farm;
use App\FeedsConsumption;
use App\Job;
use App\Mortality;
use App\PenWeighing;
use App\Weighing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DayController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function per_farm(Farm $farm)
    { 
        $days = Day::where('farm_id','=',$farm->id)->orderBy('day','asc')->get();

        $current_farm_days_ids = Day::where('farm_id','=',$farm->id)->pluck('id');
        $weighing_days_ids = Weighing::whereIn('day_id',$current_farm_days_ids)->groupBy('day_id')->pluck('day_id')->toArray();

        $list_supervisors = Job::where('name', 'supervisor')->first()->employees;
        $list_caretakers = Job::where('name', 'caretaker')->first()->employees;

        $birds_started = DB::table('building_farm')
                    ->where('farm_id', '=', $farm->id)
                    ->get();

        return view ('days.per_farm', compact ('days','farm','weighing_days_ids', 'list_supervisors', 'list_caretakers','birds_started'));
    }

    public function store(Request $request)
    {
        //Find the new day number
        $current_day_count = Day::where([
            ['farm_id', '=', $request->farm_id],
            ['building_id', '=', $request->building_id],
        ])->count();

        //Create a new day in days table
        $new_day = Day::create([
            'farm_id' => $request->farm_id,
            'building_id' => $request->building_id,
            'day' => $current_day_count + 1,
        ]);

        //Find the current building you add the day
        $current_building = Building::find($request->building_id);

        //Create mortalities per pen AM
        foreach ($current_building->pens as $pen) {
            Mortality::create([
                'day_id' => $new_day->id,
                'pen_id' => $pen->id,
                'midday' => 'am',
            ]);
        }

        //Create mortalities per pen PM
        foreach ($current_building->pens as $pen) {
            Mortality::create([
                'day_id' => $new_day->id,
                'pen_id' => $pen->id,
                'midday' => 'pm',
            ]);
        }

        //Create only on days specified by default.weighing days
        if (in_array($new_day->day, config('default.weighing_days')))
        {
            for($i = 0; $i < config('default.n_chicks_weighed')[$new_day->day]; $i++)
            {
                $new_weighing = Weighing::create([
                    'day_id' => $new_day->id,
                    'weigh_no' => $i + 1,
                ]);

                foreach ($current_building->pens as $pen) {
                    PenWeighing::create([
                        'weighing_id' => $new_weighing->id,
                        'pen_id' => $pen->id,
                    ]);
                }
            }
        }

        FeedsConsumption::create(['day_id' => $new_day->id]);

        return back();
    }

    public function show(Day $day)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Day  $day
     * @return \Illuminate\Http\Response
     */
    public function edit(Day $day)
    {
        //
    }

    public function update(Request $request, Day $day)
    {
        //
    }

    public function destroy(Day $day)
    {
        //
    }
}
