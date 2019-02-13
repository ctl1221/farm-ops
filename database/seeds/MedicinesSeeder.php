<?php

use Illuminate\Database\Seeder;
use App\Medicine;

class MedicinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Medicine::create([
        	'code' => '4212164725093',
        	'description' => 'VIT B COMPLEX (BROILER) WSP 1KG',
        	'uom' => 'PCK',
        	'kg_weight' => '1.000',
            'price' => 2500.00,
            'vatable' => 'VATABLE',
        ]);

        Medicine::create([
        	'code' => '4212161285351',
        	'description' => 'VITAMIN E 60% OS 1L',
        	'uom' => 'BTL',
        	'kg_weight' => '1.000',
            'price' => 2800.00,
            'vatable' => 'VATABLE',
        ]);

        Medicine::create([
        	'code' => '4212164704112',
        	'description' => 'ELEC - V 1KG',
        	'uom' => 'PCK',
        	'kg_weight' => '1.000',
            'price' => 1200.00,
            'vatable' => 'VATABLE',
        ]);

        Medicine::create([
        	'code' => '4212164225800',
        	'description' => 'PROTECT PLUS 1GAL',
        	'uom' => 'GAL',
        	'kg_weight' => '1.000',
            'price' => 5000.00,
            'vatable' => 'VATABLE',
        ]);
    }
}
