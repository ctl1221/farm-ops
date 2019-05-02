<?php

use App\Employee;
use App\PaySlip;
use Illuminate\Database\Seeder;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create([
        	'job_id' => 1,
        	'first_name' => 'Chiwetel',
        	'last_name' => 'Ejiofor',
        	'display_name' => 'Chiwetel Ejiofor',
        ]);

        Employee::create([
        	'job_id' => 2,
        	'first_name' => 'Chris',
        	'last_name' => 'Hemsworth',
        	'display_name' => 'Chris Hemsworth',
        ]);

        Employee::create([
            'job_id' => 3,
            'first_name' => 'Chris',
            'last_name' => 'Evans',
            'display_name' => 'Chris Evans',
        ]);

        Employee::create([
            'job_id' => 3,
            'first_name' => 'Brie',
            'last_name' => 'Larson',
            'display_name' => 'Brie Larson',
        ]);

        Employee::create([
            'job_id' => 4,
            'first_name' => 'Paul',
            'last_name' => 'Rudd',
            'display_name' => 'Paul Rudd',
        ]);

        Employee::create([
            'job_id' => 4,
            'first_name' => 'Tom',
            'last_name' => 'Holland',
            'display_name' => 'Tom Holland',
        ]);

        Employee::create([
            'job_id' => 4,
            'first_name' => 'Benedict',
            'last_name' => 'Cumberbach',
            'display_name' => 'Benedict Cumberbach',
        ]);

        Employee::create([
            'job_id' => 4,
            'first_name' => 'Mark',
            'last_name' => 'Ruffalo',
            'display_name' => 'Mark Ruffalo',
        ]);

        Employee::create([
            'job_id' => 4,
            'first_name' => 'Samuel',
            'last_name' => 'Jackson',
            'display_name' => 'Samuel Jackson',
        ]);

        Employee::create([
            'job_id' => 4,
            'first_name' => 'Robert',
            'last_name' => 'Downey',
            'display_name' => 'Robert Downey',
        ]);

        PaySlip::create([
            'employee_id' => 1,
            'date_bill' => '2018-11-01',
            'period_start' => '2018-10-23',
            'period_end' => '2018-10-31',
            'amount' => 8888.88,
            'reference' => '0150',
        ]);

        PaySlip::create([
            'employee_id' => 2,
            'date_bill' => '2018-11-02',
            'period_start' => '2018-10-23',
            'period_end' => '2018-10-31',
            'amount' => 9998.88,
            'reference' => '0151',
        ]);

        PaySlip::create([
            'employee_id' => 3,
            'date_bill' => '2018-11-02',
            'period_start' => '2018-10-23',
            'period_end' => '2018-10-31',
            'amount' => 5555.44,
            'reference' => '0152',
        ]);


        PaySlip::create([
            'employee_id' => 4,
            'date_bill' => '2018-11-03',
            'period_start' => '2018-10-25',
            'period_end' => '2018-10-31',
            'amount' => 3333.44,
            'reference' => '0153',
        ]);

        PaySlip::create([
            'employee_id' => 5,
            'date_bill' => '2018-11-04',
            'period_start' => '2018-10-25',
            'period_end' => '2018-10-31',
            'amount' => 2225.55,
            'reference' => '0154',
        ]);

        PaySlip::create([
            'employee_id' => 7,
            'date_bill' => '2018-11-04',
            'period_start' => '2018-11-25',
            'period_end' => '2018-11-30',
            'amount' => 2225.55,
            'reference' => '0154',
        ]);

        PaySlip::create([
            'employee_id' => 8,
            'date_bill' => '2018-11-04',
            'period_start' => '2018-12-25',
            'period_end' => '2018-12-30',
            'amount' => 2225.55,
            'reference' => '0154',
        ]);

        PaySlip::create([
            'employee_id' => 9,
            'date_bill' => '2018-11-04',
            'period_start' => '2018-10-23',
            'period_end' => '2018-10-30',
            'amount' => 1000,
            'reference' => '0154',
        ]);

        PaySlip::create([
            'employee_id' => 7,
            'date_bill' => '2018-11-04',
            'period_start' => '2018-10-24',
            'period_end' => '2018-10-25',
            'amount' => 2000,
            'reference' => '0154',
        ]);

        PaySlip::create([
            'employee_id' => 1,
            'date_bill' => '2018-11-04',
            'period_start' => '2018-10-20',
            'period_end' => '2018-10-25',
            'amount' => 5000,
            'reference' => '0154',
        ]);
    }
}
