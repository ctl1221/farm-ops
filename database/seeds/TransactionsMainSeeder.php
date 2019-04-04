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
        	'date_start' => '2018-10-23',
            'date_end' => '2018-10-30',
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
            'company_id' => 4,
        	'farm_id' => $farm_a->id,
        	'date_dep_hatchery' => '2018-10-23',
        	'hatchery_source' => 'Tapbi Hatchery',
        	'total_delivered' => 15116,
        	'doa_delivered' => 26,
        	'net_delivered' => 15090,
        	'truck_plate_no' => 'ZSI 885',
        	'trucker_name' => 'Karizosan',
        	'time_dep_hatchery' => '03:00:00',
        	'time_arr_farm' => '06:05:00',
        	'source_id' => 'C-S02-L C-16F-I/G-GOF-I',
        	'seal_no' => '1174997',
        	'vaccines' => 'Nacc w/ linco spectin /bda blen<br/>Nectormune hvt ndv/hvlblen'
        ]);

        Loading::create([
            'company_id' => 4,
            'farm_id' => $farm_a->id,
            'date_dep_hatchery' => '2018-10-23',
            'hatchery_source' => 'HK-PS',
            'total_delivered' => 34884,
            'doa_delivered' => 24,
            'net_delivered' => 34860,
            'truck_plate_no' => 'RNC 499',
            'trucker_name' => 'Transpo',
            'time_dep_hatchery' => '21:37:00',
            'time_arr_farm' => '09:35:00',
            'source_id' => 'R-PS7-A/R-BY3-A/R-CAF-A/R-CPP-A',
            'seal_no' => '1516521',
            'vaccines' => 'Nacc w/ linco spectin /bda blen<br/>Nectormune hvt ndv/hvlblen'
        ]);

        Loading::create([
            'company_id' => 4,
            'farm_id' => $farm_a->id,
            'date_dep_hatchery' => '2018-10-23',
            'hatchery_source' => 'HK-PS',
            'total_delivered' => 17000,
            'doa_delivered' => 10,
            'net_delivered' => 16990,
            'truck_plate_no' => 'ZTG 773',
            'trucker_name' => 'Transpo',
            'time_dep_hatchery' => '20:20:00',
            'time_arr_farm' => '20:10:00',
            'source_id' => 'P-PS7-A',
            'seal_no' => '1516520',
            'vaccines' => 'Nacc w/ linco spectin /bda blen<br/>Nectormune hvt ndv/hvlblen'
        ]);

        Loading::create([
            'company_id' => 4,
            'farm_id' => $farm_a->id,
            'date_dep_hatchery' => '2018-10-23',
            'hatchery_source' => 'HK-PS',
            'total_delivered' => 18000,
            'doa_delivered' => 20,
            'net_delivered' => 17980,
            'truck_plate_no' => 'RHR 957',
            'trucker_name' => 'EULEB',
            'time_dep_hatchery' => '19:18:00',
            'time_arr_farm' => '20:03:00',
            'source_id' => 'R-BY1-L/R-HBF-L/R-PS7-A',
            'seal_no' => '1516519',
            'vaccines' => 'Nacc w/ linco spectin /bda blen<br/>Nectormune hvt ndv/hvlblen'
        ]);
    }
}
