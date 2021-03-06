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
            'code' => '1012160432700',
            'description' => 'INTRA CHICK BOOSTER CRUMBLE 50KG',
            'short_name' => 'ICBC',
            'short_description' => 'ICBC 50KG',
            'uom' => 'BAG',
            'kg_weight' => '50',
        ]);

        Feed::create([
        	'code' => '1012160432613',
        	'description' => 'INTRA BROILER STARTER CRUMBLE 50KG',
            'short_name' => 'IBSC',
            'short_description' => 'IBSC 50KG',
        	'uom' => 'BAG',
        	'kg_weight' => '50',
        ]);

        Feed::create([
            'code' => '0000000000',
            'description' => 'INTRA BROILER GROWER CRUMBLE 50KG',
            'short_name' => 'IBGP',
            'short_description' => 'IBGC 50KG',
            'uom' => 'BAG',
            'kg_weight' => '50',
        ]);

        Feed::create([
            'code' => '0000000000',
            'description' => 'INTRA BROILER FINISHER CRUMBLE 50KG',
            'short_name' => 'IBFP',
            'short_description' => 'IBFC 50KG',
            'uom' => 'BAG',
            'kg_weight' => '50',
        ]);
    }
}
