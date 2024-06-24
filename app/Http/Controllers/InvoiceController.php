<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function invoice($invoice_number)
    {
        $invoice = Invoice::where('invoice_number', $invoice_number)->first();

        return view('invoice.invoice', compact('invoice'));
    }
}
