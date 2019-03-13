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
            'short_name' => '',
            'short_description' => '',
        	'uom' => 'PCK',
        	'kg_weight' => '1.000',
            'price' => 650.00,
            'vatable' => 'VATABLE',
        ]);

        Medicine::create([
        	'code' => '4212161285351',
        	'description' => 'VITAMIN E 60% OS 1L',
            'short_name' => '',
            'short_description' => '',
        	'uom' => 'BTL',
        	'kg_weight' => '1.000',
            'price' => 3300.00,
            'vatable' => 'VATABLE',
        ]);

        Medicine::create([
            'code' => '4212164720070',
            'description' => 'VITAMIN ADE OS 1L',
            'short_name' => '',
            'short_description' => '',
            'uom' => 'BTL',
            'kg_weight' => '1.000',
            'price' => 1750.00,
            'vatable' => 'VATABLE',
        ]);

        Medicine::create([
        	'code' => '4212164704112',
        	'description' => 'ELEC - V 1KG',
            'short_name' => '',
            'short_description' => '',
        	'uom' => 'PCK',
        	'kg_weight' => '1.000',
            'price' => 500.00,
            'vatable' => 'VATABLE',
        ]);

        Medicine::create([
        	'code' => '4212164225800',
        	'description' => 'PROTECT PLUS 1GAL',
            'short_name' => '',
            'short_description' => '',
        	'uom' => 'GAL',
        	'kg_weight' => '1.000',
            'price' => 5000.00,
            'vatable' => 'VATABLE',
        ]);
    }
}
