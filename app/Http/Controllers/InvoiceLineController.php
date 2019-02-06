<?php

namespace App\Http\Controllers;

use App\InvoiceLine;
use App\Invoice;
use App\Material;
use Illuminate\Http\Request;

class InvoiceLineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Invoice $invoice)
    {
        $material_types = json_encode(config('default.material_types'));
        $materials = Material::getAllMaterials();

        return view ('invoice_lines.create', compact('invoice','materials','material_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        InvoiceLine::create([
            'material_id' => $request->material_id,
            'material_type' => 'App\\' . $request->material_type ,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'invoice_id' => $request->invoice_id
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InvoiceLine  $invoiceLine
     * @return \Illuminate\Http\Response
     */
    public function show(InvoiceLine $invoiceLine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InvoiceLine  $invoiceLine
     * @return \Illuminate\Http\Response
     */
    public function edit(InvoiceLine $invoiceLine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InvoiceLine  $invoiceLine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InvoiceLine $invoiceLine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InvoiceLine  $invoiceLine
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvoiceLine $invoiceLine)
    {
        //
    }
}
