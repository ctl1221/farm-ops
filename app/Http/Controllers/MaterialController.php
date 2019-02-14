<?php

namespace App\Http\Controllers;

use App\Farm;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function per_farm(Farm $farm)
    {
        $list_of_medicines_delivered = $farm->invoice_lines;
        $material_types = config('default.material_types');

        return view('materials.per_farm', compact('farm','list_of_medicines_delivered', 'material_types'));
    }
}
