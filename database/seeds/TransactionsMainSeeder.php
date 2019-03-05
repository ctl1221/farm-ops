<?php

use App\Farm;
use App\Grow;
use App\Loading;
use Illuminate\Database\Seeder;

class TransactionsMainSeeder extends Seeder
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
        $farm_a->buildings()->attach(1, ['birds_started' => 25000]);
        $farm_a->buildings()->attach(2, ['birds_started' => 25000]);

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

            Loading::create([
            'farm_id' => $farm_a->id,
            'date' => '2018-10-23',
            'hatchery_source' => 'HK-PS',
            'total_delivered' => 34884,
            'doa' => 24,
            'net_received' => 34860,
            'truck_plate_no' => 'RNC 499',
            'trucker_name' => 'Transpo',
            'dep_hatchery' => '21:37:00',
            'arr_farm' => '09:35:00',
            'source_id' => 'R-PS7-A/R-BY3-A/R-CAF-A/R-CPP-A',
            'seal_no' => '1516521',
            'notes' => 'Nacc w/ linco spectin /bda blen<br/>Nectormune hvt ndv/hvlblen'
        ]);

            Loading::create([
            'farm_id' => $farm_a->id,
            'date' => '2018-10-23',
            'hatchery_source' => 'HK-PS',
            'total_delivered' => 17000,
            'doa' => 10,
            'net_received' => 16990,
            'truck_plate_no' => 'ZTG 773',
            'trucker_name' => 'Transpo',
            'dep_hatchery' => '20:20:00',
            'arr_farm' => '20:10:00',
            'source_id' => 'P-PS7-A',
            'seal_no' => '1516520',
            'notes' => 'Nacc w/ linco spectin /bda blen<br/>Nectormune hvt ndv/hvlblen'
        ]);

            Loading::create([
            'farm_id' => $farm_a->id,
            'date' => '2018-10-23',
            'hatchery_source' => 'HK-PS',
            'total_delivered' => 18000,
            'doa' => 20,
            'net_received' => 17980,
            'truck_plate_no' => 'RHR 957',
            'trucker_name' => 'EULEB',
            'dep_hatchery' => '19:18:00',
            'arr_farm' => '20:03:00',
            'source_id' => 'R-BY1-L/R-HBF-L/R-PS7-A',
            'seal_no' => '1516519',
            'notes' => 'Nacc w/ linco spectin /bda blen<br/>Nectormune hvt ndv/hvlblen'
        ]);
    }
}
