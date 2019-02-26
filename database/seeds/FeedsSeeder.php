<?php

use Illuminate\Database\Seeder;
use App\Feed;

class FeedsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Feed::create([
        	'code' => '1012160432613',
        	'description' => 'INTRA BROILER STARTER CRUMBLE 50KG',
        	'uom' => 'BAG',
        	'kg_weight' => '50',
        ]);

        Feed::create([
            'code' => '9999999999999',
            'description' => 'PERSONAL 25KG',
            'uom' => 'BAG',
            'kg_weight' => '25',
        ]);
    }
}
