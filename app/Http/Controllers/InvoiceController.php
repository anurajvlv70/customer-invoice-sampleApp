<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    
    public function index()
    {
       
        // $invoices = Invoice::all();

       
        return view('invoice');
    }

  
    public function create()
    {
        return view('admin.invoices.create');
    }
}