<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Material;
use App\InvoiceLine;
use App\Loading;
use App\Harvest;
use App\Farm;

class APIController extends Controller
{
    public function materials()
    {
    	$materials = Material::getAllMaterials();

    	return compact('materials');
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

    public function store_invoice(Request $request)
    {
    	$n_lines = count($request->lines);

    	for($i = 0; $i < $n_lines; $i++)
    	{
		    InvoiceLine::create([
		        'material_id' => $request->lines[$i]['id'],
		        'material_type' => 'App\\' . $request->lines[$i]['material_type'],
		        'price' => 0.0,
		        'quantity' => 1,
		        'invoice_id' => 1,
		    ]);
    	}

    	$url = 'https://farm-ops.dev/grows';
        return $url;
    }
}
