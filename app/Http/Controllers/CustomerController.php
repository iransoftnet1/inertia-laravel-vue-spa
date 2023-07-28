<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CustomerController extends Controller
{
    public function index()
    {
        return Inertia::render('index', [
            'customers' => Customer::all()->map(function ($customer) {
                return [
                    'id' => $customer->id,
                    'name' => $customer->name,
                ];
            })
        ]);
    }

    public function create()
    {
        return inertia::render('create');
    }

    public function store(CustomerRequest $request)
    {
        Customer::create($request->all());
        return Redirect::route('customers.index');
    }

    public function distroy(Customer $customer)
    {
        $customer->delete();
        return Redirect::route('customers.index');
    }
}
