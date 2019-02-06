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
        	'is_supplier' => false,
        	'is_customer' => false,
        ]);

        Company::create([
        	'name' => 'Meralco',
        	'is_supplier' => true,
        	'is_customer' => false,
        ]);
    }
}
