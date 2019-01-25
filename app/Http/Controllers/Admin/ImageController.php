<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\ImageModel;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Log;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function uploadLogo()
    {
        $image = ImageModel::where(['type' => 'logo', 'category_id' => 0, 'order' => 0])->first();
        return view('admin.image.logo', compact('image'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $image = ImageModel::where(['type' => 'logo', 'category_id' => 0, 'order' => 0])->first();
        return view('admin.image.logo', compact('image'));
    }


    public function storeLogo(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg|max:1048',
        ]);

        try {

            $image = $request->file;

            $imagePath = storage_path('app/public/uploads/logo/');

            $imageName = 'sultanarchviz_logo.' . $image->getClientOriginalExtension();

            if (!File::exists($imagePath)) {
                File::makeDirectory($imagePath, $mode = 0777, true, true);
            }

            if(File::exists($imagePath.$imageName)) {
                File::delete($imagePath.$imageName);
            }

            if(Image::make($image)->save($imagePath . $imageName)){

                $image = ImageModel::firstOrNew(['type' => 'logo', 'category_id' => 0, 'order' => 0]);

                $image->ref_id = null;
                $image->file_path = '/storage/' . substr($imagePath . $imageName, strpos($imagePath . $imageName, '/uploads/') + 1);
                $image->thumb_file_path = null;

                if($image->save()){

                    return redirect()->back()->with('success', "Logo successfully uploaded ! .");

                }else{
                    Log::error('There is a error in image save to database ');
                    return redirect()->back()->with('error', "Sorry! There is a error. Please try to Upload again.");
                }
            }else{

                Log::error('There is a error in ImageModel::make($image) of Logo image ');
                return redirect()->back()->with('error', "Sorry! There is a error. Please try to Upload again.");
            }

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json($e->getMessage(), 500);
        }
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

            $lastImageOrder = ImageModel::orderBy('order', 'DESC')->first();

            $image = new ImageModel();

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
            Log::error($e->getMessage());
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
        $portfolioImages = ImageModel::leftJoin('categories', 'images.category_id', '=', 'categories.id')
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
     * Remove the specified resource from storage.
     *
     */
    public function destroy(ImageModel $image)
    {
        try{
            if(File::exists($image->file_path)) {
                File::delete($image->file_path);
            }
            $image->delete();

            return ' Deleted successfully';

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json($e->getMessage(), 500);
        }


    }
}
