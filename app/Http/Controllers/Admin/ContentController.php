<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Content;
use Illuminate\Http\Request;
use Log;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        try{
          return view('admin.content.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', "sorry, There is a error".$e->getMessage().'['.$e->getLine().']');
        }

    }

    public function indexJson()
    {
        try{
          return response()->json(['data' => Content::all()]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json($e->getMessage(), 500);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.content.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        try{
            
            $requestData = $request->all();
            
            Content::create($requestData);

            return redirect()->route('content.create')->with('success', 'Content added!');

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', "sorry, There is a error".$e->getMessage().'['.$e->getLine().']');
        }



    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try{
            $content = Content::find($id);
            return view('admin.content.edit', compact('content'));

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', "sorry, There is a error".$e->getMessage().'['.$e->getLine().']');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Content $id)
    {
        try{
            $content = Content::find($id);
            
            $requestData = $request->all();
            
            $content->update($requestData);

            return redirect()->route('content.edit', $content->id)->with('success', 'Content updated!');

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', "sorry, There is a error".$e->getMessage().'['.$e->getLine().']');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        try{
            $content = Content::find($id);
            $content->delete();

            return ' Deleted successfully';
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json($e->getMessage(), 500);
        }


    }
}
