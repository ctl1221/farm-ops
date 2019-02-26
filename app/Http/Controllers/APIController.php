<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Material;
use App\InvoiceLine;
use App\Loading;
use App\Harvest;
use App\Farm;
use App\Grow;
use App\Feed;

class APIController extends Controller
{

    public function getAllFeeds()
    {
        $feeds = Feed::all();

        return compact('feeds');
    }

    public function materials()
    {
    	$materials = Material::getAllMaterials();

    	return compact('materials');
    }

    public function getFarmsOfGrow(Grow $grow)
    {
        $farms = Farm::where('grow_id',$grow->id)->with('buildings')->get();

        return $farms;
    }

    public function getLoadingsOfFarm(Farm $farm)
    {
        $loadings = Loading::where('farm_id','=', $farm->id)->orderBy('date','desc')->get();

        return compact('loadings');
    }

    public function getHarvestsOfFarm(Farm $farm)
    {
        $harvests = Harvest::where('farm_id','=', $farm->id)->orderBy('date','desc')->get();

        return compact('harvests');
    }

    public function getEmployeeAssignmentsOfGrow(Grow $grow)
    {

        $farms_of_current_grow = $grow->farms->pluck('id');

        $employee_assignments = DB::table('building_farm as first')
                                ->select('first.*')
                                ->addSelect('second.name as farm_name')
                                ->addSelect('third.display_name as supervisor_name')
                                ->addSelect('fourth.display_name as caretaker_name')
                                ->addSelect('fifth.name as building_name')
                                ->leftJoin('farms as second','first.farm_id','second.id')
                                ->leftJoin('employees as third','first.supervisor_id','third.id')
                                ->leftJoin('employees as fourth','first.caretaker_id','fourth.id')
                                ->leftJoin('buildings as fifth','first.building_id','fifth.id')
                                ->whereIn('farm_id', $farms_of_current_grow)
                                ->orderBy('second.name')
                                ->get();

        return $employee_assignments;
    }
}
