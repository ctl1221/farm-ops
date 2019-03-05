<?php

use App\Building;
use App\Day;
use App\Farm;
use App\FeedsConsumption;
use App\Mortality;
use App\PenWeighing;
use App\Weighing;
use Illuminate\Database\Seeder;

class TransactionsDailySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Farm A - Building 1:  Daily Data
        $farm_a = Farm::find(1);
        $mortalities = [34, 30, 51, 50, 55, 39, 44, 50, 38, 56, 65, 51, 78, 55, 58, 66, 75, 51, 57, 67, 47, 77, 56, 58, 47, 50, 42, 60, 
                        49, 77, 105, 76];
        $feeds_consump = [18, 20, 22, 22, 20, 25, 25, 31, 40, 45, 50, 52, 60, 71, 75, 80, 75, 80, 90, 101, 105, 110, 105, 110, 140, 150,            170, 175, 200, 150, 120, 115, 110, 60, 50, 40]; 

        for($i = 0; $i < count($mortalities); $i++)
        {
            $day = Day::create([
                'building_id' => 1,
                'farm_id' => $farm_a->id,
                'day' => $i+1
            ]);

            FeedsConsumption::create([
             'day_id' => $day->id,
             'quantity' => $feeds_consump[$i],
            ]);

            $total = 0;
            $mortality = $mortalities[$i];
            $ceil = floor($mortality / 14);
            for($x = 0; $x < 13; $x++)
            {
                $current = rand(2,$ceil);
                Mortality::create([
                    'day_id' => $day->id,
                    'pen_id' => 1,
                    'midday' => 'am',
                    'quantity' => $current
                ]);
                $total += $current;
            }
            Mortality::create([
                'day_id' => $day->id,
                'pen_id' => 1,
                'midday' => 'am',
                'quantity' => $mortality - $total
            ]);
        }

        //Farm A - Building 2: Daily Data
        $mortalities = [35, 45, 71, 58, 73, 72, 83, 55, 56, 62, 65, 98, 130, 95, 92, 109, 105, 70, 95, 88, 99, 90, 74, 66, 77, 73, 54, 90, 130, 130, 160, 170, 170, 205, 240, 85, 63, 45, 46];
        $feeds_consump = [18, 18, 20, 22, 28, 27, 33, 37, 38, 45, 50, 62, 66, 71, 75, 80, 95, 99, 99, 98, 103, 100, 110, 110, 133, 146,               158, 175, 185, 150, 160, 115, 110, 80, 87, 83, 60, 50, 40]; 

        for($i = 0; $i < count($mortalities); $i++)
        {
            $day = Day::create([
                'building_id' => 2,
                'farm_id' => $farm_a->id,
                'day' => $i+1
            ]);

            FeedsConsumption::create([
             'day_id' => $day->id,
             'quantity' => $feeds_consump[$i],
            ]);

            $total = 0;
            $mortality = $mortalities[$i];
            $ceil = floor($mortality / 14);
            for($x = 0; $x < 13; $x++)
            {
                $current = rand(2,$ceil);
                Mortality::create([
                    'day_id' => $day->id,
                    'pen_id' => 1,
                    'midday' => 'am',
                    'quantity' => $current
                ]);
                $total += $current;
            }
            Mortality::create([
                'day_id' => $day->id,
                'pen_id' => 1,
                'midday' => 'am',
                'quantity' => $mortality - $total
            ]);

             //Create only on days specified by default.weighing days
            $alw = [1,2,3,1907.6];
            if (in_array($day->day, config('default.weighing_days')))
            {
                $building = Building::find(1);

                for($g = 0; $g < config('default.n_chicks_weighed')[$day->day]; $g++)
                {
                    $weighing = Weighing::create([
                        'day_id' => $day->id,
                        'weigh_no' => $g + 1,
                    ]);

                    foreach ($building->pens as $pen) {
                        PenWeighing::create([
                            'weighing_id' => $weighing->id,
                            'pen_id' => $pen->id,
                            'weight' => $alw[$day->day/7 - 1]
                        ]);
                    }
                }
            }

            //Create only on days specified by default.weighing days
            $alw = [1,2,3,1907.6];
            if (in_array($day->day, config('default.weighing_days')))
            {
                $building = Building::find(2);

                for($g = 0; $g < config('default.n_chicks_weighed')[$day->day]; $g++)
                {
                    $weighing = Weighing::create([
                        'day_id' => $day->id,
                        'weigh_no' => $g + 1,
                    ]);

                    foreach ($building->pens as $pen) {
                        PenWeighing::create([
                            'weighing_id' => $weighing->id,
                            'pen_id' => $pen->id,
                            'weight' => $alw[$day->day/7 - 1]
                        ]);
                    }
                }
            }
        }
    }
}
