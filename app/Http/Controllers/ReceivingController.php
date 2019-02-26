<?php

namespace App\Http\Controllers;

use App\Receiving;
use App\ReceivingLine;
use App\Grow;
use App\Farm;
use App\Feed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReceivingController extends Controller
{
    public function index()
    {
        //
    }

    public function per_farm(Farm $farm)
    {
        $feeds = Feed::all();

        return view('receivings.per_farm', compact('farm', 'feeds'));
    }

    public function create(Grow $grow)
    {
        
        return view('receivings.create', compact('grow'));
    }

    public function store(Request $request)
    {
        //DB::transaction(function () {
            $receiving = Receiving::create([
                'farm_id' => $request->farm_id,
                'doc_no' => $request->doc_no,
                'date' => $request->date,
            ]);

            foreach ($request->lines as $x) {
                ReceivingLine::create([
                    'receiving_id' => $receiving->id,
                    'material_type' => 'App\Feeds',
                    'material_id' => $x['material_id'],
                    'quantity' => $x['quantity'],
                    'batch_no' => $x['batch_no']
                ]);
            }
        //});

        $message = "Success";

        return ['message' => $message ];
    }

    public function show(Receiving $receiving)
    {
        //
    }

    public function edit(Receiving $receiving)
    {
        //
    }

    public function update(Request $request, Receiving $receiving)
    {
        //
    }

    public function destroy(Receiving $receiving)
    {
        //
    }
}
