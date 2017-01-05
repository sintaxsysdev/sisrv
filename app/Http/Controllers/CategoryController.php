<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\Datatables\Facades\Datatables;

class CategoryController extends Controller
{
    public function listing()
    {
        $categories = Category::select([
            'id',
            'category_name',
            'category_description',
            'created_at',
            'updated_at'
        ]);

        return Datatables::of($categories)
            ->addColumn('action', function ($category) {
                return '<a href="category/' . $category->id . '/edit" class="btn btn-primary btn-xs">✓</a> 
                <button type="button" class="btn btn-danger btn-xs" value="' . $category->id . '" onclick="confirmDelete(this);" data-toggle="modal" data-target="#modalQuestion">✗</button>';
            })
            ->editColumn('created_at', function ($category) {
                return $category->created_at->toFormattedDateString();
            })
            ->editColumn('updated_at', function ($category) {
                return $category->updated_at->toFormattedDateString();
            })
            ->make(true);
    }

    public function index()
    {
        return view('category.index');
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(CategoryCreateRequest $request)
    {
        Category::create($request->all());

        Session::flash('success', '¡Categoría agregada correctamente!');

        return redirect()->route('category.index');
    }

    public function show()
    {
        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category = Category::findOrfail($id);

        return view('category.edit', ['category' => $category]);
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        $category = Category::findOrfail($id);

        $category->fill($request->all());

        $category->save();

        Session::flash('success', '¡Categoría actualizada correctamente!');

        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return response()->json([
            'message' => '¡Categoría eliminada correctamente!'
        ]);
    }
}
