<?php

use App\Farm;
use App\Invoice;
use App\InvoiceLine;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionsInvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $farm_a = Farm::find(1);
        

        $invoice = new Invoice;
        DB::transaction(function () use ($invoice, $farm_a){
        	$invoice->farm_id = $farm_a->id;
        	$invoice->date = '2018-11-06';
        	$invoice->supplier_invoice_no = '1115-60149587';
        	$invoice->company_id = 3;
        	$invoice->dr_reference_no = '7205195385';
        	$invoice->so_reference_no = '1208243329/9205149580';
        	$invoice->save();

	    	InvoiceLine::create([
	    		'invoice_id' => $invoice->id,
	    		'material_type' => 'App\Disinfectant',
	    		'material_id' => 2,
	    		'quantity' => 1,
	    		'price' => 1442
	    	]);
        });

        $invoice = new Invoice;
        DB::transaction(function () use ($invoice, $farm_a){
        	$invoice->farm_id = $farm_a->id;
        	$invoice->date = '2018-10-22';
        	$invoice->supplier_invoice_no = '1114-10717789';
        	$invoice->company_id = 3;
        	$invoice->dr_reference_no = '7221716431';
        	$invoice->so_reference_no = '1220952634/8220717667';
        	$invoice->save();

	    	InvoiceLine::create([
	    		'invoice_id' => $invoice->id,
	    		'material_type' => 'App\Medicine',
	    		'material_id' => 1,
	    		'quantity' => 5,
	    		'price' => 650
	    	]);

	    	InvoiceLine::create([
	    		'invoice_id' => $invoice->id,
	    		'material_type' => 'App\Medicine',
	    		'material_id' => 2,
	    		'quantity' => 5,
	    		'price' => 3300
	    	]);

	    	InvoiceLine::create([
	    		'invoice_id' => $invoice->id,
	    		'material_type' => 'App\Medicine',
	    		'material_id' => 3,
	    		'quantity' => 18,
	    		'price' => 1750
	    	]);

	    	InvoiceLine::create([
	    		'invoice_id' => $invoice->id,
	    		'material_type' => 'App\Medicine',
	    		'material_id' => 4,
	    		'quantity' => 1,
	    		'price' => 500
	    	]);
        });

    }
}
