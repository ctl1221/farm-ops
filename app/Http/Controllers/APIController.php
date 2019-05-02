<?php

namespace App\Http\Controllers;

use App\Company;
use App\Day;
use App\Farm;
use App\Feed;
use App\Grow;
use App\Harvest;
use App\InvoiceLine;
use App\Loading;
use App\Material;
use App\PaySlip;
use App\Receiving;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{
    
    public function getAllFeeds()
    {
        $feeds = Feed::all();

        return compact('feeds');
    }

    public function getAllMaterials()
    {
    	$materials = Material::getAllMaterials();

    	return compact('materials');
    }

    public function getAllDressingPlants()
    {
        $dressing_plants = Company::where('is_dressing_plant',true)->get();

        return compact('dressing_plants');
    }

    public function getFarmsOfGrow(Grow $grow)
    {
        $farms = Farm::where('grow_id',$grow->id)->with('buildings','sales')->get();

        return $farms;
    }

    public function getDaysRecordedOfGrow($grow)
    {
        $array = [];
        foreach($grow->farms as $key => $farm)
        {
            $temp = [];
            foreach($farm->buildings as $x)
            {
                $day = Day::where('building_id',$x->id)->where('farm_id', $farm->id)->orderBy('day','desc')->first();
                array_push($temp, $day ? $day->day : 0);   
            }
            $array[$key] = $temp;
        }

        return $array;
    }

    public function getReceivingsOfFarm(Farm $farm)
    {
        $receivings = Receiving::with('receiving_lines','truck_weighings')->where('farm_id', $farm->id)->get();

        return compact('receivings');
    }

    public function getHarvestsOfFarm(Farm $farm)
    {

        $harvests = Harvest::where('farm_id', $farm->id)
            ->with('delivery','truck_weighings')
            ->orderBy('date')
            ->orderBy('control_no')
            ->get();

        return compact('harvests');
    }

    public function getAllPaySlips(Request $request)
    {
        $payslips = PaySlip::with('employee')
            ->whereRaw('YEAR(period_start) = ' . $request->year)
            ->whereRaw('MONTH(period_start) = ' . $request->month)
            ->orderBy('period_start','desc')->get();

        return compact('payslips');
    }

    public function getEmployeeAssignmentsOfGrow(Grow $grow)
    {

        $farms_of_current_grow = $grow->farms->pluck('id');

        $employee_assignments = DB::table('building_farm as first')
                                ->select('first.*')
                                ->addSelect('second.name as farm_name')
                                ->addSelect('sixth.display_name as manager_name')
                                ->addSelect('third.display_name as supervisor_name')
                                ->addSelect('fourth.display_name as caretaker_name')
                                ->addSelect('fifth.name as building_name')
                                ->leftJoin('farms as second','first.farm_id','second.id')
                                ->leftJoin('employees as third','first.supervisor_id','third.id')
                                ->leftJoin('employees as fourth','first.caretaker_id','fourth.id')
                                ->leftJoin('buildings as fifth','first.building_id','fifth.id')
                                ->leftJoin('employees as sixth','first.manager_id','sixth.id')
                                ->whereIn('farm_id', $farms_of_current_grow)
                                ->orderBy('second.name')
                                ->get();

        return $employee_assignments;
    }

}
