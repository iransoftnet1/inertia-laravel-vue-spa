<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerCreateRequest;
use App\Http\Requests\CustomerUpdateRequest;
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

    public function store(CustomerCreateRequest $request)
    {
        Customer::create($request->all());
        return Redirect::route('customers.index');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return Redirect::route('customers.index');
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
        return Redirect::route('customers.index');
    }
}
