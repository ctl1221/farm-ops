<?php

use Illuminate\Database\Seeder;
use App\Building;

class BuildingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($x = 1; $x <= 10; $x++)
        {
            Building::create(['name' => 'Building ' . $x]);
        }
    }
}
