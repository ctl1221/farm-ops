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
            'code' => '1012160432700',
            'description' => 'INTRA CHICK BOOSTER CRUMBLE 50KG',
            'uom' => 'BAG',
            'kg_weight' => '50',
        ]);

        Feed::create([
            'code' => '0000000000',
            'description' => 'INTRA BROILER GROWER CRUMBLE 50KG',
            'uom' => 'BAG',
            'kg_weight' => '50',
        ]);

        Feed::create([
            'code' => '0000000000',
            'description' => 'INTRA BROILER FINISHER CRUMBLE 50KG',
            'uom' => 'BAG',
            'kg_weight' => '50',
        ]);
    }
}
