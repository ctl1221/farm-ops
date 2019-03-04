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


                TruckWeighing::create([
                'receiving_id' => $receiving->id,
                'kg_net_weight' => 10970,
                'ticket_no' => '0013'
            ]);
        });

        $receiving = new Receiving;
        
        DB::transaction(function () use ($receiving, $farm_a){
            $receiving->farm_id = $farm_a->id;
            $receiving->doc_no = '4908714038';
            $receiving->date = '2018-11-21';
            $receiving->save();

            ReceivingLine::create([
                'receiving_id' => $receiving->id,
                'material_type' => 'App\Feed',
                'material_id' => 4,
                'quantity' => 153,
                'batch_no' => '81120CF44F'
            ]);

            ReceivingLine::create([
                'receiving_id' => $receiving->id,
                'material_type' => 'App\Feed',
                'material_id' => 4,
                'quantity' => 67,
                'batch_no' => '81120CF44S'
            ]);
        });
    	
    	TruckWeighing::create([
    		'receiving_id' => $receiving->id,
    		'kg_net_weight' => 11000,
    		'ticket_no' => '0886'
    	]);

        $receiving = new Receiving;
        
        DB::transaction(function () use ($receiving, $farm_a){
            $receiving->farm_id = $farm_a->id;
            $receiving->doc_no = '4908687562';
            $receiving->date = '2018-11-20';
            $receiving->save();

            ReceivingLine::create([
                'receiving_id' => $receiving->id,
                'material_type' => 'App\Feed',
                'material_id' => 3,
                'quantity' => 222,
                'batch_no' => '81119CF44F'
            ]);

            ReceivingLine::create([
                'receiving_id' => $receiving->id,
                'material_type' => 'App\Feed',
                'material_id' => 4,
                'quantity' => 228,
                'batch_no' => '81118CF44F'
            ]);
        });
        
        TruckWeighing::create([
            'receiving_id' => $receiving->id,
            'kg_net_weight' => 11230,
            'ticket_no' => '0881'
        ]);

        TruckWeighing::create([
            'receiving_id' => $receiving->id,
            'kg_net_weight' => 11300,
            'ticket_no' => '0880'
        ]);

        $receiving = new Receiving;
        
        DB::transaction(function () use ($receiving, $farm_a){
            $receiving->farm_id = $farm_a->id;
            $receiving->doc_no = '4908645011';
            $receiving->date = '2018-11-19';
            $receiving->save();

            ReceivingLine::create([
                'receiving_id' => $receiving->id,
                'material_type' => 'App\Feed',
                'material_id' => 3,
                'quantity' => 220,
                'batch_no' => '81110CF43F'
            ]);
        });
        
        TruckWeighing::create([
            'receiving_id' => $receiving->id,
            'kg_net_weight' => 10990,
            'ticket_no' => '0863'
        ]);

        $receiving = new Receiving;
        
        DB::transaction(function () use ($receiving, $farm_a){
            $receiving->farm_id = $farm_a->id;
            $receiving->doc_no = '4908627233';
            $receiving->date = '2018-11-18';
            $receiving->save();

            ReceivingLine::create([
                'receiving_id' => $receiving->id,
                'material_type' => 'App\Feed',
                'material_id' => 3,
                'quantity' => 178,
                'batch_no' => '81115F40FS'
            ]);

            ReceivingLine::create([
                'receiving_id' => $receiving->id,
                'material_type' => 'App\Feed',
                'material_id' => 3,
                'quantity' => 42,
                'batch_no' => '81115F40SS'
            ]);
        });
        
        TruckWeighing::create([
            'receiving_id' => $receiving->id,
            'kg_net_weight' => 10960,
            'ticket_no' => '0856'
        ]);

        $receiving = new Receiving;
        
        DB::transaction(function () use ($receiving, $farm_a){
            $receiving->farm_id = $farm_a->id;
            $receiving->doc_no = '4908576098';
            $receiving->date = '2018-11-16';
            $receiving->save();

            ReceivingLine::create([
                'receiving_id' => $receiving->id,
                'material_type' => 'App\Feed',
                'material_id' => 3,
                'quantity' => 220,
                'batch_no' => '81112CF44F'
            ]);

        });
        
        TruckWeighing::create([
            'receiving_id' => $receiving->id,
            'kg_net_weight' => 11010,
            'ticket_no' => '0840'
        ]);

        $receiving = new Receiving;
        
        DB::transaction(function () use ($receiving, $farm_a){
            $receiving->farm_id = $farm_a->id;
            $receiving->doc_no = '4908576096';
            $receiving->date = '2018-11-16';
            $receiving->save();

            ReceivingLine::create([
                'receiving_id' => $receiving->id,
                'material_type' => 'App\Feed',
                'material_id' => 3,
                'quantity' => 220,
                'batch_no' => '81112CF44F'
            ]);

        });
        
        TruckWeighing::create([
            'receiving_id' => $receiving->id,
            'kg_net_weight' => 11000,
            'ticket_no' => '0841'
        ]);

        $receiving = new Receiving;
        
        DB::transaction(function () use ($receiving, $farm_a){
            $receiving->farm_id = $farm_a->id;
            $receiving->doc_no = '4908512635';
            $receiving->date = '2018-11-14';
            $receiving->save();

            ReceivingLine::create([
                'receiving_id' => $receiving->id,
                'material_type' => 'App\Feed',
                'material_id' => 3,
                'quantity' => 200,
                'batch_no' => '81110CF46F'
            ]);

            ReceivingLine::create([
                'receiving_id' => $receiving->id,
                'material_type' => 'App\Feed',
                'material_id' => 3,
                'quantity' => 20,
                'batch_no' => '81110CF46S'
            ]);
        });
        
        TruckWeighing::create([
            'receiving_id' => $receiving->id,
            'kg_net_weight' => 10990,
            'ticket_no' => '0825'
        ]);

        $receiving = new Receiving;
        
        DB::transaction(function () use ($receiving, $farm_a){
            $receiving->farm_id = $farm_a->id;
            $receiving->doc_no = '4908870422';
            $receiving->date = '2018-11-27';
            $receiving->save();

            ReceivingLine::create([
                'receiving_id' => $receiving->id,
                'material_type' => 'App\Feed',
                'material_id' => 4,
                'quantity' => 220,
                'batch_no' => '81123CF43F'
            ]);
        });
        
        TruckWeighing::create([
            'receiving_id' => $receiving->id,
            'kg_net_weight' => 10990,
            'ticket_no' => '0059'
        ]);

        $receiving = new Receiving;
        
        DB::transaction(function () use ($receiving, $farm_a){
            $receiving->farm_id = $farm_a->id;
            $receiving->doc_no = '4908416774';
            $receiving->date = '2018-11-10';
            $receiving->save();

            ReceivingLine::create([
                'receiving_id' => $receiving->id,
                'material_type' => 'App\Feed',
                'material_id' => 3,
                'quantity' => 400,
                'batch_no' => '81106CF46F'
            ]);
        });
        
        TruckWeighing::create([
            'receiving_id' => $receiving->id,
            'kg_net_weight' => 9980,
            'ticket_no' => '0810'
        ]);
        TruckWeighing::create([
            'receiving_id' => $receiving->id,
            'kg_net_weight' => 9980,
            'ticket_no' => '0811'
        ]);

        $receiving = new Receiving;
        
        DB::transaction(function () use ($receiving, $farm_a){
            $receiving->farm_id = $farm_a->id;
            $receiving->doc_no = '4908353963';
            $receiving->date = '2018-11-08';
            $receiving->save();

            ReceivingLine::create([
                'receiving_id' => $receiving->id,
                'material_type' => 'App\Feed',
                'material_id' => 2,
                'quantity' => 220,
                'batch_no' => '81107CF51S'
            ]);
        });
        
        TruckWeighing::create([
            'receiving_id' => $receiving->id,
            'kg_net_weight' => 11010,
            'ticket_no' => '0793'
        ]);

        $receiving = new Receiving;
        
        DB::transaction(function () use ($receiving, $farm_a){
            $receiving->farm_id = $farm_a->id;
            $receiving->doc_no = '4908300752';
            $receiving->date = '2018-11-06';
            $receiving->save();

            ReceivingLine::create([
                'receiving_id' => $receiving->id,
                'material_type' => 'App\Feed',
                'material_id' => 2,
                'quantity' => 450,
                'batch_no' => '81104CF51S'
            ]);
        });
        
        TruckWeighing::create([
            'receiving_id' => $receiving->id,
            'kg_net_weight' => 11250,
            'ticket_no' => '0785'
        ]);
        TruckWeighing::create([
            'receiving_id' => $receiving->id,
            'kg_net_weight' => 11250,
            'ticket_no' => '0787'
        ]);

         $receiving = new Receiving;
        
        DB::transaction(function () use ($receiving, $farm_a){
            $receiving->farm_id = $farm_a->id;
            $receiving->doc_no = '4908263152';
            $receiving->date = '2018-11-05';
            $receiving->save();

            ReceivingLine::create([
                'receiving_id' => $receiving->id,
                'material_type' => 'App\Feed',
                'material_id' => 2,
                'quantity' => 220,
                'batch_no' => '81029CF51F'
            ]);
        });
        
        TruckWeighing::create([
            'receiving_id' => $receiving->id,
            'kg_net_weight' => 10990,
            'ticket_no' => '0000'
        ]);

         $receiving = new Receiving;
        
        DB::transaction(function () use ($receiving, $farm_a){
            $receiving->farm_id = $farm_a->id;
            $receiving->doc_no = '4908191469';
            $receiving->date = '2018-11-02';
            $receiving->save();

            ReceivingLine::create([
                'receiving_id' => $receiving->id,
                'material_type' => 'App\Feed',
                'material_id' => 2,
                'quantity' => 220,
                'batch_no' => '81024CF51S'
            ]);
        });
        
        TruckWeighing::create([
            'receiving_id' => $receiving->id,
            'kg_net_weight' => 11000,
            'ticket_no' => '0773'
        ]);

         $receiving = new Receiving;
        
        DB::transaction(function () use ($receiving, $farm_a){
            $receiving->farm_id = $farm_a->id;
            $receiving->doc_no = '4908157720';
            $receiving->date = '2018-10-31';
            $receiving->save();

            ReceivingLine::create([
                'receiving_id' => $receiving->id,
                'material_type' => 'App\Feed',
                'material_id' => 2,
                'quantity' => 220,
                'batch_no' => '81024CF51S'
            ]);
        });
        
        TruckWeighing::create([
            'receiving_id' => $receiving->id,
            'kg_net_weight' => 11010,
            'ticket_no' => '0770'
        ]);

        $receiving = new Receiving;
        
        DB::transaction(function () use ($receiving, $farm_a){
            $receiving->farm_id = $farm_a->id;
            $receiving->doc_no = '4908130105';
            $receiving->date = '2018-10-30';
            $receiving->save();

            ReceivingLine::create([
                'receiving_id' => $receiving->id,
                'material_type' => 'App\Feed',
                'material_id' => 1,
                'quantity' => 166,
                'batch_no' => '81027CF51S'
            ]);
            ReceivingLine::create([
                'receiving_id' => $receiving->id,
                'material_type' => 'App\Feed',
                'material_id' => 2,
                'quantity' => 54,
                'batch_no' => '81024CF51S'
            ]);
        });
        
        TruckWeighing::create([
            'receiving_id' => $receiving->id,
            'kg_net_weight' => 11020,
            'ticket_no' => '0766'
        ]);

        $receiving = new Receiving;
        
        DB::transaction(function () use ($receiving, $farm_a){
            $receiving->farm_id = $farm_a->id;
            $receiving->doc_no = '4908008304';
            $receiving->date = '2018-10-26';
            $receiving->save();

            ReceivingLine::create([
                'receiving_id' => $receiving->id,
                'material_type' => 'App\Feed',
                'material_id' => 1,
                'quantity' => 220,
                'batch_no' => '81024CF47T'
            ]);
        });
        
        TruckWeighing::create([
            'receiving_id' => $receiving->id,
            'kg_net_weight' => 11010,
            'ticket_no' => '0751'
        ]);

        $receiving = new Receiving;
        
        DB::transaction(function () use ($receiving, $farm_a){
            $receiving->farm_id = $farm_a->id;
            $receiving->doc_no = '4907918714';
            $receiving->date = '2018-10-23';
            $receiving->save();

            ReceivingLine::create([
                'receiving_id' => $receiving->id,
                'material_type' => 'App\Feed',
                'material_id' => 1,
                'quantity' => 220,
                'batch_no' => '81021CF47S'
            ]);
        });
        
        TruckWeighing::create([
            'receiving_id' => $receiving->id,
            'kg_net_weight' => 11000,
            'ticket_no' => '0713'
        ]);

        $receiving = new Receiving;
        
        DB::transaction(function () use ($receiving, $farm_a){
            $receiving->farm_id = $farm_a->id;
            $receiving->doc_no = '490788991';
            $receiving->date = '2018-10-22';
            $receiving->save();

            ReceivingLine::create([
                'receiving_id' => $receiving->id,
                'material_type' => 'App\Feed',
                'material_id' => 1,
                'quantity' => 71,
                'batch_no' => '81020CF51F'
            ]);
            ReceivingLine::create([
                'receiving_id' => $receiving->id,
                'material_type' => 'App\Feed',
                'material_id' => 1,
                'quantity' => 179,
                'batch_no' => '81020CF51S'
            ]);
        });
        
        TruckWeighing::create([
            'receiving_id' => $receiving->id,
            'kg_net_weight' => 12500,
            'ticket_no' => '0696'
        ]);
        
    	//Farm A - Building 1:  Daily Data
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
        $feeds_consump = [18, 18, 20, 22, 28, 27, 33, 37, 38, 45, 50, 62, 66, 71, 75, 80, 95, 99, 99, 98, 103, 100, 110, 110, 133, 146,               158, 175, 185, 150, 160, 115, 110, 60, 50, 40, 0, 0, 0]; 

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
        }

    	
    }
}
