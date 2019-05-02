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
        $this->call(FacilitiesSeeder::class);
        $this->call(DisinfectantsSeeder::class);
        $this->call(TransactionsMainSeeder::class);
        $this->call(TransactionsReceivingSeeder::class);
        $this->call(TransactionsInvoiceSeeder::class);
        $this->call(TransactionsDailySeeder::class);
        $this->call(TransactionsHarvestSeeder::class);
        $this->call(RatesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(BillingsSeeder::class);
        $this->call(ItemsSeeder::class);
        
        //$this->call(TransactionsSeeder::class);
    }
}
