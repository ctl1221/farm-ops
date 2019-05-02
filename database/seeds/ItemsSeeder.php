<?php

use Illuminate\Database\Seeder;
use App\Item;

class ItemsSeeder extends Seeder
{
    public function run()
    {
        Item::create([
        	'code' => '4212164725093',
        	'type' => 'Medicine',
        	'description' => 'VIT B COMPLEX (BROILER) WSP 1KG',
            'short_name' => '',
            'short_description' => '',
        	'uom' => 'PCK',
        	'kg_weight' => '1.000',
            'price' => 650.00,
            'vatable' => 'VATABLE',
        ]);

        Item::create([
        	'code' => '4212161285351',
        	'type' => 'Medicine',
        	'description' => 'VITAMIN E 60% OS 1L',
            'short_name' => '',
            'short_description' => '',
        	'uom' => 'BTL',
        	'kg_weight' => '1.000',
            'price' => 3300.00,
            'vatable' => 'VATABLE',
        ]);

        Item::create([
            'code' => '4212164720070',
            'type' => 'Medicine',
            'description' => 'VITAMIN ADE OS 1L',
            'short_name' => '',
            'short_description' => '',
            'uom' => 'BTL',
            'kg_weight' => '1.000',
            'price' => 1750.00,
            'vatable' => 'VATABLE',
        ]);

        Item::create([
        	'code' => '4212164704112',
        	'type' => 'Medicine',
        	'description' => 'ELEC - V 1KG',
            'short_name' => '',
            'short_description' => '',
        	'uom' => 'PCK',
        	'kg_weight' => '1.000',
            'price' => 500.00,
            'vatable' => 'VATABLE',
        ]);

        Item::create([
        	'code' => '4212164225800',
        	'type' => 'Medicine',
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
