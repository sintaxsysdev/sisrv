<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierCreateRequest;
use App\Http\Requests\SupplierUpdateRequest;
use App\Supplier;
use Illuminate\Support\Facades\Session;
use Yajra\Datatables\Facades\Datatables;

class SupplierController extends Controller
{
    public function listing()
    {
        $suppliers = Supplier::select([
            'id',
            'supplier_businessname',
            'supplier_ruc',
            'supplier_phone'
        ]);

        return Datatables::of($suppliers)
            ->addColumn('action', function ($supplier) {
                return '<a href="supplier/' . $supplier->id . '" class="btn btn-warning btn-xs">O</a> 
                <a href="supplier/' . $supplier->id . '/edit" class="btn btn-primary btn-xs">✓</a> 
                <button type="button" class="btn btn-danger btn-xs" value="' . $supplier->id . '" onclick="confirmDeleteSupplier(this);" data-toggle="modal" data-target="#modalQuestion">✗</button>';
            })
            ->make(true);
    }

    public function index()
    {
        return view('supplier.index');
    }

    public function create()
    {
        return view('supplier.create');
    }

    public function store(SupplierCreateRequest $request)
    {
        Supplier::create($request->all());

        Session::flash('success', '¡Proveedor agregado correctamente!');

        return redirect()->route('supplier.index');
    }

    public function show($id)
    {
        $supplier = Supplier::findOrFail($id);

        return view('supplier.show', ['supplier' => $supplier]);
    }

    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);

        return view('supplier.edit', ['supplier' => $supplier]);
    }

    public function update(SupplierUpdateRequest $request, $id)
    {
        $supplier = Supplier::findOrFail($id);

        $supplier->fill($request->all());

        $supplier->save();

        Session::flash('success', '¡Proveedor actualizado correctamente!');

        return redirect()->route('supplier.index');
    }

    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);

        $supplier->delete();

        return response()->json([
            'message' => '¡Proveedor eliminado correctamente!'
        ]);
    }
}
