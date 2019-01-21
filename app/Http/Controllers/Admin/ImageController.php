<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {

        return view('admin.image.index');
    }

    public function indexJson()
    {

        return response()->json(['data' => Image::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.image.create');
    }


    public function storeImages($categoryId, $type, Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {

            $image = $request->file;

            $imagePath = storage_path('app/public/uploads/' . $type);
            $fileController = new FilesController();


            $fileUpload = $fileController->uploadImage($image, $imagePath);

            $lastImageOrder = Image::where('category_id', $categoryId)->orderBy('order', 'DESC')->first();

            $image = new \App\Models\Image();

            $image->type = $type;
            $image->category_id = $categoryId;
            $image->ref_id = null;
            $image->file_path = '/storage/' . substr($fileUpload->mid_image, strpos($fileUpload->mid_image, '/uploads/') + 1);
            $image->thumb_file_path = '/storage/' . substr($fileUpload->thumb_image, strpos($fileUpload->thumb_image, '/uploads/') + 1);
            $image->order = ($lastImageOrder) ? $lastImageOrder->order + 1 : 1;

            if($image->save()){

                return response()->json('File Uploaded', 200);
            }

        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }


    public function showPortfolioImage($type)
    {
        $category = Category::where('category', $type)->first();
        return view('admin.image.portfolio')->with('category', $category);
    }


    public function portfolioImageJson($categoryId, $type)
    {

        $portfolioImages = Image::leftJoin('categories', 'images.category_id', '=', 'categories.id')
            ->where('category_id', $categoryId)
            ->orderBy('order', 'Desc')
            ->get([
                'images.id',
                'images.thumb_file_path',
                'images.order',
                'images.type',
                'categories.name',
            ]);

        return response()->json(['data' => $portfolioImages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {

        $requestData = $request->all();

        Image::create($requestData);

        return redirect()->route('image.create')->with('success', 'Image added!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $image = Image::find($id);
        return view('admin.image.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Image $image)
    {

        $requestData = $request->all();

        $image->update($requestData);

        return redirect()->route('image.edit', $image->id)->with('success', 'Image updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        $image = Image::find($id);
        $image->delete();

        return ' Deleted successfully';

    }
}
