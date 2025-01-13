<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\Customer;
class CustomerController extends Controller
{

    public function index($type)
    {
        $userdetails=customer::all();
     
        // $customers = Customer::all();
        if ($type=='customer') {

            
        //  dd($userdetails);
        return view('customer',compact('userdetails'));
        }
        elseif ($type=='invoice') {
            $invoices = Invoice::with('customer')->get();
            // dd($invoices);
            return view('invoice',compact('userdetails','invoices'));
        }
    
        
    }

    public function add()
    {
        

        return view('addcustomer');
    }

    public function cus_store(Request $request)
    {
        
        if ($request->input('mode')=='customer') {
            # code...
           
        // Validate the incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',         // Validate name: required, string, max length 255
            'email' => 'required|email|email',  // Validate email: required, valid email, unique in customers table
            'phone' => 'required|string|max:15',        // Validate phone: required, string, max length 15
            'address' => 'required|string|max:255',     // Validate address: required, string, max length 255
        ]);
        
        if($request->input('operation')=='create'){

        // Store the validated data in the database
        Customer::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
        ]);
        
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Customer registered successfully!');
    }
    elseif ($request->input('operation')=='edit') {
        
        $userId=$request->input('userId');
        $customer=Customer::where('id',$userId)->first();
        $customer->name = $validated['name'];
            $customer->email = $validated['email'];
            $customer-> phone = $validated['phone'];
            $customer->address = $validated['address'];
            $customer->save();
            return redirect()->back()->with('success', 'Customer edited successfully!');
    }
}

// invoice area

elseif ($request->input('mode')=='invoice') {
    
     // Validate the incoming request
     $validated = $request->validate([
        'customer' => 'required|string|max:255',         // Validate name: required, string, max length 255
        'date' => 'required',  // Validate email: required, valid email, unique in customers table
        'amount' => 'required',        // Validate phone: required, string, max length 15
        'status' => 'required|string',     // Validate address: required, string, max length 255
    ]);
    
    if($request->input('operation')=='create'){

    // Store the validated data in the database
    Invoice::create([
        'customer_Id' => $validated['customer'],
        'date' => $validated['date'],
        'amount' => $validated['amount'],
        'status' => $validated['status'],
    ]);
    
    // Redirect back with a success message
    return redirect()->back()->with('success', 'Customer registered successfully!');
}
elseif ($request->input('operation')=='edit') {
    
    $invoiceId=$request->input('invoiceId');
    
    $invoice=Invoice::where('id',$invoiceId)->first();
    //dd($validated['customer']);
        $invoice->customer_Id = $validated['customer'];
        $invoice->date = $validated['date'];
        $invoice-> amount = $validated['amount'];
        $invoice->status = $validated['status'];
        $invoice->save();
        //dd($invoice);
        return redirect()->back()->with('success', 'Customer edited successfully!');
}
}
    }


}