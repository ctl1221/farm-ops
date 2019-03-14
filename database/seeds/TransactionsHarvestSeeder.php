<?php

use App\Harvest;
use App\Delivery;
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
        $harvest = Harvest::create([
            'control_no' => '436216',
            'farm_id' => 1,
            'dressing_plant' => 'IP4 Lipa',
            'truck_plate_no' => 'MV 237',
            'date' => '2018-11-23',
            'total_harvested' => 1624,
            'coops_per_truck' => 232
        ]);

        Delivery::create([
            'harvest_id' => $harvest->id,
            'shift' => 'D',
            'time_in_plant' => '05:47',
            'time_weighed_plant' => '08:10',
            'kg_plant_net_weight' => '3021.9',
            'kg_plant_feeds_in_crop' => '0.00',
            'kg_adjusted_net_weight' => '3062.23', 
            'alw_rate' => '5.8'
        ]);
    }
}
