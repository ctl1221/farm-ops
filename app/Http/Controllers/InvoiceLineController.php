<?php

namespace App\Http\Controllers;

use App\InvoiceLine;
use App\Invoice;
use App\Material;
use Illuminate\Http\Request;

class InvoiceLineController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

}
