<?php

use App\Farm;
use App\Receiving;
use App\ReceivingLine;
use App\TruckWeighing;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionsReceivingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Farm A - Create Material Slips
        $farm_a = Farm::find(1);
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
                'activity_id' => $receiving->id,
                'activity_type' => 'App\Receiving',
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
    		'activity_id' => $receiving->id,
            'activity_type' => 'App\Receiving',
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
            'activity_id' => $receiving->id,
            'activity_type' => 'App\Receiving',
            'kg_net_weight' => 11230,
            'ticket_no' => '0881'
        ]);

        TruckWeighing::create([
            'activity_id' => $receiving->id,
            'activity_type' => 'App\Receiving',
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
            'activity_id' => $receiving->id,
            'activity_type' => 'App\Receiving',
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
            'activity_id' => $receiving->id,
            'activity_type' => 'App\Receiving',
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
            'activity_id' => $receiving->id,
            'activity_type' => 'App\Receiving',
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
            'activity_id' => $receiving->id,
            'activity_type' => 'App\Receiving',
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
            'activity_id' => $receiving->id,
            'activity_type' => 'App\Receiving',
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
            'activity_id' => $receiving->id,
            'activity_type' => 'App\Receiving',
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
            'activity_id' => $receiving->id,
            'activity_type' => 'App\Receiving',
            'kg_net_weight' => 9980,
            'ticket_no' => '0810'
        ]);

        TruckWeighing::create([
            'activity_id' => $receiving->id,
            'activity_type' => 'App\Receiving',
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
            'activity_id' => $receiving->id,
            'activity_type' => 'App\Receiving',
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
            'activity_id' => $receiving->id,
            'activity_type' => 'App\Receiving',
            'kg_net_weight' => 11250,
            'ticket_no' => '0785'
        ]);
        TruckWeighing::create([
            'activity_id' => $receiving->id,
            'activity_type' => 'App\Receiving',
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
            'activity_id' => $receiving->id,
            'activity_type' => 'App\Receiving',
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
            'activity_id' => $receiving->id,
            'activity_type' => 'App\Receiving',
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
            'activity_id' => $receiving->id,
            'activity_type' => 'App\Receiving',
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
            'activity_id' => $receiving->id,
            'activity_type' => 'App\Receiving',
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
            'activity_id' => $receiving->id,
            'activity_type' => 'App\Receiving',
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
            'activity_id' => $receiving->id,
            'activity_type' => 'App\Receiving',
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
            'activity_id' => $receiving->id,
            'activity_type' => 'App\Receiving',
            'kg_net_weight' => 12500,
            'ticket_no' => '0696'
        ]);
    }
}
