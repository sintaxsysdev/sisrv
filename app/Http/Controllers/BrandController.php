<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Http\Requests\BrandRequest;
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
        Brand::create($request->all());
        return redirect()->route('brand.index');
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('brand.edit', ['brand' => $brand]);
    }

    public function update(BrandRequest $request, $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->fill($request->all());
        $brand->save();
        return redirect()->route('brand.index');
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect()->route('brand.index');
    }
}
