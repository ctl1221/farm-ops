<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\InvoiceLine;
use App\Grow;
use App\Company;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{

    public function create(Grow $grow)
    {
        $suppliers = Company::where('is_supplier', '=', true)->get();

        return view('invoices.create', compact('grow', 'suppliers'));
    }

    public function store(Request $request)
    {
        $invoice = Invoice::create([
            'farm_id' => $request->farm_id,
            'date' => $request->date,
            'supplier_invoice_no' => $request->supplier_invoice_no,
            'company_id' => $request->company_id,
            'dr_reference_no' => $request->dr_reference_no,
            'so_reference_no' => $request->so_reference_no,
        ]);

        for($i = 0; $i < $request->n_lines; $i++)
        {
            InvoiceLine::create([
                'material_id' => $request->lines[$i]['id'],
                'material_type' => 'App\\' . $request->lines[$i]['material_type'],
                'price' => $request->lines[$i]['price'],
                'quantity' => $request->lines[$i]['quantity'],
                'invoice_id' => $invoice->id,
            ]);
        }

        $url = '/grows/' . $request->grow_id;

        return $url;
    }

    public function show(Invoice $invoice)
    {
        //
    }

    public function edit(Invoice $invoice)
    {
        //
    }


    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    public function destroy(Invoice $invoice)
    {
        //
    }
}
