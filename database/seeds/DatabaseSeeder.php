<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(BuildingsSeeder::class);
        $this->call(PensSeeder::class);
        $this->call(MedicinesSeeder::class);
        $this->call(EmployeesSeeder::class);
        $this->call(JobsSeeder::class);
        $this->call(FeedsSeeder::class);
        $this->call(CompaniesSeeder::class);
        $this->call(DisinfectantsSeeder::class);
    }
}
