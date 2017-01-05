<?php

namespace App\Http\Controllers;

use App\Http\Requests\WarehouseCreateRequest;
use App\Http\Requests\WarehouseUpdateRequest;
use App\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\Datatables\Facades\Datatables;

class WarehouseController extends Controller
{
    public function listing()
    {
        $warehouses = Warehouse::select([
            'id',
            'warehouse_name',
            'warehouse_description',
            'warehouse_status',
            'created_at'
        ]);

        return Datatables::of($warehouses)
            ->addColumn('action', function ($warehouse) {
                if ($warehouse->warehouse_status) {
                    $warehousestatus = '<span class="btn btn-success btn-xs">On</span>';
                } else {
                    $warehousestatus = '<span class="btn btn-danger btn-xs">Off</span>';
                }
                return $warehousestatus . ' <a href="warehouse/' . $warehouse->id . '/edit" class="btn btn-primary btn-xs">✓</a> 
                <button type="button" class="btn btn-danger btn-xs" value="' . $warehouse->id . '" onclick="confirmDelete(this);" data-toggle="modal" data-target="#modalQuestion">✗</button>';
            })
            ->editColumn('created_at', function ($warehouse) {
                return $warehouse->created_at->toFormattedDateString();
            })
            ->editColumn('updated_at', function ($warehouse) {
                return $warehouse->updated_at->toFormattedDateString();
            })
            ->make(true);

    }

    public function index()
    {
        return view('warehouse.index');
    }

    public function create()
    {
        return view('warehouse.create');
    }

    public function store(WarehouseCreateRequest $request)
    {
        Warehouse::create($request->all());

        Session::flash('success', '¡Almacén agregado correctamente!');

        return redirect()->route('warehouse.index');
    }

    public function show()
    {
        return redirect()->route('warehouse.index');
    }

    public function edit($id)
    {
        $warehouse = Warehouse::findOrFail($id);

        return view('warehouse.edit', ['warehouse' => $warehouse]);
    }

    public function update(WarehouseUpdateRequest $request, $id)
    {
        $warehouse = Warehouse::findOrFail($id);

        $warehouse->fill($request->all());

        $warehouse->save();

        Session::flash('success', '¡Almacén actualizado correctamente!');

        return redirect()->route('warehouse.index');
    }

    public function destroy($id)
    {
        $warehouse = Warehouse::findOrFail($id);

        $warehouse->delete();

        return response()->json([
            'message' => '¡Almacén eliminado correctamente!'
        ]);
    }
}
