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
            'farm_id' => 1,
            'date' => '2018-11-23',
            'truck_plate_no' => 'MV 237',
            'total_birds_harvested' => 1624,
        ]);

        Harvest::create([
            'farm_id' => 1,
            'date' => '2018-11-23',
            'truck_plate_no' => 'UUP 454',
            'total_birds_harvested' => 1674,
        ]);
        Harvest::create([
            'farm_id' => 1,
            'date' => '2018-11-23',
            'truck_plate_no' => 'JM 0397',
            'total_birds_harvested' => 1920,
        ]);
        Harvest::create([
            'farm_id' => 1,
            'date' => '2018-11-23',
            'truck_plate_no' => 'JM 0299',
            'total_birds_harvested' => 1920,
        ]);
    }
}
