<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers=Customer::all();
        return view('admin.customer.index')->with('customers',$customers);
    }

    public function show($id)
    {
        $customer=Customer::find($id);
        return view('admin.customer.show')->with('customer',$customer);
    }

    public function status($id)
    {
        $customer=Customer::find($id);
        if($customer->status=="active"){
            $customer->status='inactive';
        }
        else{
            $customer->status='active';
        }
        $customer->save();
        return redirect()
        ->route('admin.customer')->
        with('success','Status is updated successfully');
    }
}
