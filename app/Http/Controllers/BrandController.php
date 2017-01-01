<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Http\Requests\BrandRequest;
use Exception;
use Illuminate\Support\Facades\Session;
use Yajra\Datatables\Facades\Datatables;

class BrandController extends Controller
{
    public function listing()
    {
        $brands = Brand::select([
            'id',
            'brand_name',
            'created_at',
            'updated_at'
        ]);

        return Datatables::of($brands)
            ->addColumn('action', function ($brand) {
                return '<a href="brand/' . $brand->id . '/edit" class="btn btn-primary btn-xs">✓</a> 
                <button type="button" class="btn btn-danger btn-xs" value="' . $brand->id . '" onclick="ConfirmDeleteMake(this);" data-toggle="modal" data-target="#modalQuestion">✗</button>';
            })
            ->editColumn('created_at', function ($brand) {
                return $brand->created_at->toFormattedDateString();
            })
            ->editColumn('updated_at', function ($brand) {
                return $brand->updated_at->toFormattedDateString();
            })
            ->make(true);
    }

    public function index()
    {
        return view('brand.index');
    }

    public function create()
    {
        return view('brand.create');
    }

    public function store(BrandRequest $request)
    {
        try {
            if (Brand::create($request->all())) {
                Session::flash('success', '¡Marca agregada correctamente!');
            }
            return redirect()->route('brand.index');
        } catch (Exception $e) {
            Session::flash('error', '¡Marca no pudo ser agregada!');
            return redirect()->route('brand.index');
        }
    }

    public function show()
    {
        return redirect()->route('brand.index');
    }

    public function edit($id)
    {
        try {
            $brand = Brand::findOrFail($id);
            return view('brand.edit', ['brand' => $brand]);
        } catch (Exception $e) {
            Session::flash('error', '¡Marca no pudo ser encontrada!');
            return redirect()->route('brand.index');
        }
    }

    public function update(BrandRequest $request, $id)
    {
        try {
            $brand = Brand::findOrFail($id);
            $brand->fill($request->all());
            if ($brand->save()) {
                Session::flash('success', '¡Marca actualizada correctamente!');
            }
            return redirect()->route('brand.index');
        } catch (Exception $e) {
            Session::flash('error', '¡Marca no pudo ser actualizada!');
            return redirect()->route('brand.index');
        }
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return response()->json([
            'message' => '¡Marca eliminada correctamente!'
        ]);
    }
}
