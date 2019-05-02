<?php

use Illuminate\Database\Seeder;
use App\Company;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
        	'name' => 'Superstar Coconut Products Inc',
        ]);

        Company::create([
        	'name' => 'Meralco',
        	'is_supplier' => true,
            'is_biller' => true,
        ]);

        Company::create([
            'name' => 'San Miguel Foods, Inc - Feeds Business',
            'is_supplier' => true,
        ]);

        Company::create([
            'name' => 'San Miguel Foods, Inc - Magnolia Poultry Farms',
            'is_chick_supplier' => true,
        ]);

        Company::create([
            'name' => 'Tiaong',
            'is_dressing_plant' => true,
        ]);
    }
}
