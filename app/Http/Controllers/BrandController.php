<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\BrandRequestUpdate;
use Exception;
use Illuminate\Support\Facades\Session;
use Yajra\Datatables\Facades\Datatables;

class BrandController extends Controller
{
    public function listing()
    {
        $brands = Brand::select(['id', 'brand_name', 'created_at', 'updated_at']);

        return Datatables::of($brands)
            ->addColumn('action', function ($brand) {
                return '<a href="brand/' . $brand->id . '/edit">Editar</a>';
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
        $brands = Brand::all();

        return view('brand.index', compact('brands'));
    }

    public function create()
    {
        return view('brand.create');
    }

    public function store(BrandRequest $request)
    {
        if (Brand::create($request->all())) {
            Session::flash('success', '¡Marca agregado correctamente!');
        }

        Session::flash('error', '¡Marca no agregado correctamente!');

        return redirect()->route('brand.index');
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('brand.edit', ['brand' => $brand]);
    }

    public function update(BrandRequestUpdate $request, $id)
    {
        try {
            $brand = Brand::findOrFail($id);
            $brand->fill($request->all());
            if ($brand->save()) {
                Session::flash('success', '¡Marca actualizado correctamente!');
            }
            return redirect()->route('brand.index');
        } catch (Exception $e) {
            Session::flash('error', '¡Marca no fue actualizado!');
            return redirect()->route('brand.index');
        }
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect()->route('brand.index');
    }
}
