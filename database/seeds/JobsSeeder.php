<?php

use Illuminate\Database\Seeder;
use App\Job;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job::create([
            'name' => 'manager',
            'daily_salary' => 318.93,
            'daily_allowance' => 514.40,
        ]);

        Job::create([
            'name' => 'assistant_manager',
            'daily_salary' => 318.93,
            'daily_allowance' => 181.06,
        ]);

        Job::create([
        	'name' => 'supervisor',
            'daily_salary' => 318.93,
            'daily_allowance' => 81.06,
        ]);

        Job::create([
        	'name' => 'caretaker',
            'daily_salary' => 266.66,
            'daily_allowance' => 0,
        ]);
    }
}
