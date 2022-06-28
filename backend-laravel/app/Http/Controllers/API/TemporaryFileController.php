<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;
use Image;

class TemporaryFileController extends Controller
{
    public $path;
    public $dimensions;

    public function __construct()
    {
        $this->path = storage_path(env('APP_TEMP_DIR'));
        $this->dimensions = ['245', '300', '500'];
    }

    public function image(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $file = $request->file('image');

        $asset = $this->upload_temp($file);

        if ($asset) {
            return response()->json([
                'status' => trans('messages.response.success'),
                'data' => $asset
            ], 201);
        } else {
            return response()->json([
                'status' => trans('messages.response.error'),
                'data' => $asset
            ], 400);
        }
    }

    public function video(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:video/mp4,video/x-m4v,video/*',
        ]);

        $file = $request->file('video');

        $asset = $this->upload_video_temp($file);

        if ($asset) {
            return response()->json([
                'status' => trans('messages.response.success'),
                'data' => $asset
            ], 201);
        } else {
            return response()->json([
                'status' => trans('messages.response.error'),
                'data' => $asset
            ], 400);
        }
    }

    public function file(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $file = $request->file('image');

        $asset = $this->upload_temp($file);

        if ($asset) {
            return response()->json([
                'status' => trans('messages.response.success'),
                'data' => $asset
            ], 201);
        } else {
            return response()->json([
                'status' => trans('messages.response.error'),
                'data' => $asset
            ], 400);
        }
    }


    public function upload_temp($file)
    {
        $folder = uniqid() . '-' . now()->timestamp;

        if (!File::isDirectory($this->path . '/' . $folder)) {
            File::makeDirectory($this->path . '/' . $folder, 0775, true, true);
        }

        $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
        Image::make($file)->save($this->path . '/' . $folder . '/' . $fileName);

        foreach ($this->dimensions as $row) {
            $canvas = Image::canvas($row, $row);
            $resizeImage  = Image::make($file)->resize($row, $row, function ($constraint) {
                $constraint->aspectRatio();
            });

            if (!File::isDirectory($this->path . '/' . $folder . '/' . $row)) {
                File::makeDirectory($this->path . '/' . $folder . '/' . $row, 0775, true, true);
            }

            $canvas->insert($resizeImage, 'center');
            $canvas->save($this->path . '/' . $folder . '/' . $row . '/' . $fileName);
        }

        $tempFile = new TemporaryFile();
        $tempFile->folder = $folder;
        $tempFile->file_name = $fileName;
        $tempFile->user_id = auth()->user()->id;
        $tempFile->date = now();
        $tempFile->save();

        return $tempFile;
    }

    public function upload_video_temp($file)
    {
        $folder = uniqid() . '-' . now()->timestamp;

        if (!File::isDirectory($this->path . '/' . $folder)) {
            File::makeDirectory($this->path . '/' . $folder, 0775, true, true);
        }

        $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
        Image::make($file)->save($this->path . '/' . $folder . '/' . $fileName);

        foreach ($this->dimensions as $row) {
            $canvas = Image::canvas($row, $row);
            $resizeImage  = Image::make($file)->resize($row, $row, function ($constraint) {
                $constraint->aspectRatio();
            });

            if (!File::isDirectory($this->path . '/' . $folder . '/' . $row)) {
                File::makeDirectory($this->path . '/' . $folder . '/' . $row, 0775, true, true);
            }

            $canvas->insert($resizeImage, 'center');
            $canvas->save($this->path . '/' . $folder . '/' . $row . '/' . $fileName);
        }

        $tempFile = new TemporaryFile();
        $tempFile->folder = $folder;
        $tempFile->file_name = $fileName;
        $tempFile->user_id = auth()->user()->id;
        $tempFile->date = now();
        $tempFile->save();

        return $tempFile;
    }
}
