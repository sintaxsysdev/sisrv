<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\CustomerCreateRequest;
use App\Http\Requests\CustomerUpdateRequest;
use Illuminate\Support\Facades\Session;
use Yajra\Datatables\Facades\Datatables;

class CustomerController extends Controller
{
    public function listing()
    {
        $customers = Customer::select([
            'id',
            'customer_businessname',
            'customer_ruc_dni',
            'customer_phone'
        ]);

        return Datatables::of($customers)
            ->addColumn('action', function ($customer) {
                return '<a href="customer/' . $customer->id . '" class="btn btn-warning btn-xs">O</a>
                <a href="customer/' . $customer->id . '/edit" class="btn btn-primary btn-xs">✓</a> 
                <button type="button" class="btn btn-danger btn-xs" value="' . $customer->id . '" onclick="confirmDelete(this);" data-toggle="modal" data-target="#modalQuestion">✗</button>';
            })
            ->make(true);
    }

    public function index()
    {
        return view('customer.index');
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(CustomerCreateRequest $request)
    {
        Customer::create($request->all());

        Session::flash('success', '¡Cliente agregado correctamente!');

        return redirect()->route('customer.index');
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);

        return view('customer.show', ['customer' => $customer]);
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);

        return view('customer.edit', ['customer' => $customer]);
    }

    public function update(CustomerUpdateRequest $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $customer->fill($request->all());

        $customer->save();

        Session::flash('success', '¡Cliente actualizado correctamente!');

        return redirect()->route('customer.index');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);

        $customer->delete();

        return response()->json([
            'message' => '¡Cliente eliminado correctamente!'
        ]);
    }
}
