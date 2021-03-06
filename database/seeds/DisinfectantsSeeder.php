<?php

use Illuminate\Database\Seeder;
use App\Disinfectant;

class DisinfectantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Disinfectant::create([
        	'code' => '54080879898',
        	'description' => 'PEST CONTROL A',
            'uom' => 'BTL',
            'kg_weight' => '1.000',
            'price' => 1000.00,
            'vatable' => 'VATABLE',
        ]);

        Disinfectant::create([
            'code' => '4212154204100',
            'description' => 'BESTAQUAM',
            'uom' => 'L',
            'kg_weight' => '1.000',
            'price' => 1442.00,
            'vatable' => 'VATABLE',
        ]);

    }
}
