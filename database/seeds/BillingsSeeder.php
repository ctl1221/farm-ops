<?php

use Illuminate\Database\Seeder;
use App\Billing;

class BillingsSeeder extends Seeder
{
    public function run()
    {
        Billing::create([
            'period_start' => '2018-10-23',
            'period_end' => '2018-10-31',
            'amount' => 8888.88,
            'supplier_id' => 1,
            'type' => 'Electricity',
        ]);

        Billing::create([
            'period_start' => '2018-10-23',
            'period_end' => '2018-10-31',
            'amount' => 9998.88,
            'supplier_id' => 1,
            'type' => 'Electricity',
        ]);

        Billing::create([
            'period_start' => '2018-10-23',
            'period_end' => '2018-10-31',
            'amount' => 5555.44,
            'supplier_id' => 1,
            'type' => 'Electricity',
        ]);

        Billing::create([    
            'period_start' => '2018-10-25',
            'period_end' => '2018-10-31',
            'amount' => 3333.44,
            'supplier_id' => 1,
            'type' => 'Electricity',
        ]);

        Billing::create([
            'period_start' => '2018-10-25',
            'period_end' => '2018-10-31',
            'amount' => 2225.55,
            'supplier_id' => 1,
            'type' => 'Electricity',
        ]);

        Billing::create([
            'period_start' => '2018-11-25',
            'period_end' => '2018-11-30',
            'amount' => 2225.55,
            'supplier_id' => 1,
            'type' => 'Electricity',
        ]);

        Billing::create([
            'period_start' => '2018-12-25',
            'period_end' => '2018-12-30',
            'amount' => 2225.55,
            'supplier_id' => 1,
            'type' => 'Electricity',
        ]);

        Billing::create([
            'period_start' => '2018-10-23',
            'period_end' => '2018-10-30',
            'amount' => 1000,
            'supplier_id' => 1,
            'type' => 'Electricity',
        ]);

        Billing::create([
            'period_start' => '2018-10-24',
            'period_end' => '2018-10-25',
            'amount' => 2000,
            'supplier_id' => 1,
            'type' => 'Electricity',
        ]);

        Billing::create([
            'period_start' => '2018-10-20',
            'period_end' => '2018-10-25',
            'amount' => 5000,
            'supplier_id' => 1,
            'type' => 'Electricity',
        ]);
    }
}
