<?php

namespace App\Http\Controllers;

use App\Http\Requests\MakeRequest;
use App\Make;

class MakeController extends Controller
{
    public function index()
    {
        $makes = Make::all();

        return view('make.index', compact('makes'));
    }

    public function create()
    {
        return view('make.create');
    }

    public function store(MakeRequest $request)
    {
        Make::create($request->all());

        return redirect('/makes');
    }

    public function edit($id)
    {
        $make = Make::find($id);

        return view('make.edit', ['make' => $make]);
    }

    public function update(MakeRequest $request, $id)
    {
        $make = Make::find($id);

        $make->fill($request->all());

        $make->save();

        return redirect('/makes');
    }

    public function destroy($id)
    {
        Make::destroy($id);

        return redirect('/makes');
    }
}
