<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {

        return view('admin.category.index');
    }

    public function indexJson()
    {

        return response()->json(['data' => Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        $requestData['category'] = strtolower( str_replace(' ', '_', $request->name));

        dd($requestData);
        
        Category::create($requestData);

        return redirect()->route('category.create')->with('success', 'Category added!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Category $category)
    {

        $requestData = $request->all();
        
        $category->update($requestData);

        return redirect()->route('category.edit', $category->id)->with('success', 'Category updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return ' Deleted successfully';

    }
}
