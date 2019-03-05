<?php

use App\Facility;
use Illuminate\Database\Seeder;

class FacilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Facility::create([
        	'name' => 'IP4 LIPA',
        	'is_dressing_plant' => true
        ]);
    }
}
