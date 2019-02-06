<?php

use Illuminate\Database\Seeder;
use App\Employee;

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
    }
}
