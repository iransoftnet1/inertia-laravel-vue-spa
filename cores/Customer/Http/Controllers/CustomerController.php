<?php

namespace Customer\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerCreateRequest;
use App\Http\Requests\CustomerUpdateRequest;
use Customer\DB\Models\Customer;
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

    public function store(CustomerCreateRequest $request)
    {
        Customer::create($request->all());
        return Redirect::route('customers.index')->with('message','customer created successfully');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return Redirect::route('customers.index')->with('message','customer deleted successfully');
    }

    public function edit(Customer $customer)
    {
        return Inertia::render('edit', [
            'customer' => $customer
        ]);
    }

    public function update(CustomerUpdateRequest $request, Customer $customer)
    {
        $customer->update($request->all());
        return Redirect::route('customers.index')->with('message','customer edited successfully');
    }

    public function show(Customer $customer)
    {
        return Inertia::render('show', [
            'customer' => $customer
        ]);
    }
}
