<?php

use App\Harvest;
use Illuminate\Database\Seeder;

class TransactionsHarvestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //RS Slip - Farm A
        Harvest::create([
            'control_no' => '436216',
            'farm_id' => 1,
            'dressing_plant' => 'IP4 Lipa',
            'truck_plate_no' => 'MV 237',
            'date' => '2018-11-23',
            //'shift' => 'D',
            'total_harvested' => 1624,
            // 'time_in_plant' => '02:50',
            // 'time_weighed_plant' => '04:15',
            // 'kg_plant_net_weight' => '3021.9',
            // 'kg_plant_feeds_in_crop' => '0',
            'coops_per_truck' => 232
        ]);
    }
}
