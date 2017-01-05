<?php

namespace App\Http\Controllers;

use App\Http\Requests\MeasureRequest;
use App\Measure;
use Illuminate\Support\Facades\Session;
use Yajra\Datatables\Facades\Datatables;

class MeasureController extends Controller
{
    public function listing()
    {
        $measures = Measure::select([
            'id',
            'measure_name',
            'created_at',
            'updated_at'
        ]);

        return Datatables::of($measures)
            ->addColumn('action', function ($measure) {
                return '<a href="measure/' . $measure->id . '/edit" class="btn btn-primary btn-xs">✓</a> 
                <button type="button" class="btn btn-danger btn-xs" value="' . $measure->id . '" onclick="confirmDelete(this);" data-toggle="modal" data-target="#modalQuestion">✗</button>';
            })
            ->editColumn('created_at', function ($measure) {
                return $measure->created_at->toFormattedDateString();
            })
            ->editColumn('updated_at', function ($measure) {
                return $measure->updated_at->toFormattedDateString();
            })
            ->make(true);
    }

    public function index()
    {
        return view('measure.index');
    }

    public function create()
    {
        return view('measure.create');
    }

    public function store(MeasureRequest $request)
    {
        Measure::create($request->all());

        Session::flash('success', '¡Medida agregada correctamente!');

        return redirect()->route('measure.index');
    }

    public function show()
    {
        return redirect()->route('brand.index');
    }

    public function edit($id)
    {
        $measure = Measure::findOrFail($id);

        return view('measure.edit', ['measure' => $measure]);
    }

    public function update(MeasureRequest $request, $id)
    {
        $measure = Measure::findOrFail($id);

        $measure->fill($request->all());

        $measure->save();

        Session::flash('success', '¡Medida actualizada correctamente!');

        return redirect()->route('measure.index');
    }

    public function destroy($id)
    {
        $measure = Measure::findOrFail($id);

        $measure->delete();

        return response()->json([
            'message' => '¡Medida eliminada correctamente!'
        ]);
    }
}
