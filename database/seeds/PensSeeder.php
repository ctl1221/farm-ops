<?php

use Illuminate\Database\Seeder;
use App\Building;
use App\Pen;

class PensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buildings = Building::all();

        foreach ($buildings as $building) {
        	for($x = 1; $x <= 7; $x++)
        	{
            	Pen::create([
            		'name' => 'Pen ' . $x,
            		'building_id' => $building->id,
            	]);
        	}
        }
    }
}
