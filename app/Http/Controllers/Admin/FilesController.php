<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class FilesController extends Controller
{

    public function store($type, Request $request)
    {
        try {
            $this->validate($request, [
                'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $image = $request->file;


            $imagePath = storage_path('app/public/uploads/' . $type);

            if($this->uploadImage($image, $imagePath)){

                return response()->json('File Uploaded', 200);
            }

        } catch (\Exception $e) {

            return response()->json($e->getMessage(), 500);
        }

    }

    public function uploadImage($image, $imagePath)
    {

        $imageName = uniqid() . '.' . $image->getClientOriginalExtension();

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

        Image::make($image)->resize(1000, null, function ($constraint) {

            $constraint->aspectRatio();

        })->save($midSizePath . $imageName);

        return (object)[
            'mid_image' => $midSizePath . $imageName,
            'thumb_image' => $thumbnailPath . $imageName
        ];
    }

}
