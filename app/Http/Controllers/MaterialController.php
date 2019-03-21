<?php

namespace App\Http\Controllers;

use App\Farm;
use App\InvoiceLine;
use App\ReceivingLine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterialController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function per_farm(Farm $farm)
    {


        $ids_of_materials_invoiced = $farm->invoice_lines->pluck('id');
        $ids_of_materials_received = $farm->receiving_lines->pluck('id');

        $x = InvoiceLine::with('material','invoice')->whereIn('id',$ids_of_materials_invoiced)->get()->toArray();
        $y = ReceivingLine::with('material','receiving')->whereIn('id',$ids_of_materials_received)->get()->toArray();
        $all_materials_received = array_merge($y,$x);

        $material_types = config('default.material_types');

        return view('materials.per_farm', compact('farm','all_materials_received', 'material_types'));
    }
}
