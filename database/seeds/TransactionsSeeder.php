<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Grow;
use App\Farm;
use App\Loading;
use App\Receiving;
use App\ReceivingLine;
use App\TruckWeighing;
use App\Day;
use App\FeedsConsumption;
use App\Mortality;

class TransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 		//Grow
        $grow = Grow::create([
        	'cycle' => 'Grow 2018-07',
        	'date_start' => '2018-10-23'
        ]);

        //Farm A
        $farm_a = Farm::create([
        	'grow_id' => $grow->id,
        	'name' => 'Farm A',
        ]);

        //Farm A - Attach Building 1 and 2
        $farm_a->buildings()->attach(1, ['birds_started' => 0]);
        $farm_a->buildings()->attach(2, ['birds_started' => 0]);

        //Farm A - Create Chick Delivery Receipts
        Loading::create([
        	'farm_id' => $farm_a->id,
        	'date' => '2018-10-23',
        	'hatchery_source' => 'Tapbi Hatchery',
        	'total_delivered' => 15116,
        	'doa' => 26,
        	'net_received' => 15090,
        	'truck_plate_no' => 'ZSI 885',
        	'trucker_name' => 'Karizosan',
        	'dep_hatchery' => '03:00:00',
        	'arr_farm' => '06:05:00',
        	'source_id' => 'C-S02-L C-16F-I/G-GOF-I',
        	'seal_no' => '1174997',
        	'notes' => 'Nacc w/ linco spectin /bda blen<br/>Nectormune hvt ndv/hvlblen'
        ]);

        //Farm A - Create Material Slips
        $receiving = new Receiving;
        
        DB::transaction(function () use ($receiving, $farm_a){
        	$receiving->farm_id = $farm_a->id;
        	$receiving->doc_no = '4908835922';
        	$receiving->date = '2018-11-26';
        	$receiving->save();

	    	ReceivingLine::create([
	    		'receiving_id' => $receiving->id,
	    		'material_type' => 'App\Feed',
	    		'material_id' => 4,
	    		'quantity' => 220,
	    		'batch_no' => '81124CF449'
	    	]);
        });
    	
    	TruckWeighing::create([
    		'receiving_id' => $receiving->id,
    		'kg_net_weight' => 10970,
    		'ticket_no' => '0051'
    	]);

    	//Farm A - Building 1 - Day 1 : Daily Data
    	$day = Day::create([
    		'building_id' => 1,
    		'farm_id' => $farm_a->id,
    		'day' => '1'
    	]);

    	FeedsConsumption::create([
    		'day_id' => $day->id,
    		'quantity' => 18,
    	]);

    	Mortality::create([
    		'day_id' => $day->id,
    		'pen_id' => 1,
    		'midday' => 'am',
    		'quantity' => 6
    	]);


        
    }
}
