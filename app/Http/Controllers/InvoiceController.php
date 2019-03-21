<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\InvoiceLine;
use App\Grow;
use App\Farm;
use App\Company;
use App\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Farm $farm)
    {
        $suppliers = Company::where('is_supplier', '=', true)->get();
        $materials = Material::getAllMaterials();

        return view('invoices.create', compact('farm', 'suppliers','materials'));
    }

    public function store(Request $request)
    {
        //DB::transaction(function () {

            $invoice = Invoice::create([
                'farm_id' => $request->farm_id,
                'date' => $request->date,
                'supplier_invoice_no' => $request->supplier_invoice_no,
                'company_id' => $request->company_id,
                'dr_reference_no' => $request->dr_reference_no,
                'so_reference_no' => $request->so_reference_no,
            ]);

            foreach ($request->lines as $x) {
                InvoiceLine::create([
                    'invoice_id' => $invoice->id,
                    'material_type' => 'App\\' . $x['material_type'],
                    'material_id' => $x['material_id'],
                    'quantity' => $x['quantity'],
                    'price' => $x['price']
                ]);
            }

        //});

        return 'success';
    }

    public function per_farm(Farm $farm)
    {
        return view('invoices.per_farm', compact('farm'));
    }

}
