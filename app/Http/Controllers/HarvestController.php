<?php

namespace App\Http\Controllers;

use App\Harvest;
use App\Farm;
use Illuminate\Http\Request;

class HarvestController extends Controller
{
    public function per_farm(Farm $farm)
    {
        return view('harvests.per_farm', compact('farm'));
    }

    public function store(Request $request)
    {
        Harvest::create($request->all());

        return back();
    }

}
