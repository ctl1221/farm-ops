<?php

namespace App\Http\Controllers;

use App\Building;
use App\Farm;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    
    public function updateBirdStarted(Request $request)
    {
        $current_farm = Farm::find($request->farm_id);
        $current_farm->buildings()->updateExistingPivot($request->building_id, ['birds_started' => $request->birds_started]);

        return back();
    }

    public function assignBuildingManager(Request $request)
    {
        $current_farm = Farm::find($request->farm_id);
        $current_farm->buildings()->updateExistingPivot($request->building_id, ['manager_id' => $request->manager_id]);

        return back();
    }

    public function unassignBuildingManager(Request $request)
    {
        $current_farm = Farm::find($request->farm_id);
        $current_farm->buildings()->updateExistingPivot($request->building_id, ['manager_id' => NULL]);

        return back();
    }

    public function assignBuildingSupervisor(Request $request)
    {
        $current_farm = Farm::find($request->farm_id);
        $current_farm->buildings()->updateExistingPivot($request->building_id, ['supervisor_id' => $request->supervisor_id]);

        return back();
    }

    public function unassignBuildingSupervisor(Request $request)
    {
        $current_farm = Farm::find($request->farm_id);
        $current_farm->buildings()->updateExistingPivot($request->building_id, ['supervisor_id' => NULL]);

        return back();
    }

    public function assignBuildingCaretaker(Request $request)
    {
        $current_farm = Farm::find($request->farm_id);
        $current_farm->buildings()->updateExistingPivot($request->building_id, ['caretaker_id' => $request->caretaker_id]);

        return back();
    }

    public function unassignBuildingCaretaker(Request $request)
    {
        $current_farm = Farm::find($request->farm_id);
        $current_farm->buildings()->updateExistingPivot($request->building_id, ['caretaker_id' => NULL]);

        return back();
    }

    public function assignFarm(Farm $farm, Request $request)
    {
        $farm->buildings()->attach($request->building_id);

        return back();
    }
}
