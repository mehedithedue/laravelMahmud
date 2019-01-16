<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;


class FilesController extends Controller
{

    public function store($type, Request $request)
    {
        $this->validate($request, [
            'file' => 'image|max:1000'
        ]);

        $image = $request->file;

        $imagePath = public_path('uploads/' . $type);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $fileName = $this->uploadImage($image, $imagePath);

        return response()->json([
            'file_name' => $fileName,
        ], 200);

    }

    public function uploadImage($image, $imagePath)
    {

        $imageName = uniqid() . time() . '.' . $image->getClientOriginalExtension();

        $thumbnailPath = $imagePath . '/thumbnail/';
        $midSizePath = $imagePath . '/mid/';

        if (!File::exists($thumbnailPath)) {

            File::makeDirectory($thumbnailPath, $mode = 0777, true, true);
        }

        if (!File::exists($midSizePath)) {

            File::makeDirectory($midSizePath, $mode = 0777, true, true);
        }

        Image::make($image)->resize(250, null, function ($constraint) {

            $constraint->aspectRatio();

        })->save($thumbnailPath . $imageName);

        Image::make($image)->resize(900, null, function ($constraint) {

            $constraint->aspectRatio();

        })->save($midSizePath . $imageName);

        return $imageName;
    }

}
