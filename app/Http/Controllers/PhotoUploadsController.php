<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\PhotoUploads;
use App\Http\Resources\PhotoUploadsResource;

class PhotoUploadsController extends Controller
{
    public function upload(Request $request)
    {
        $data = $request->validate([
            'picture'   => ['required', 'image'],
            'name'     => ['required', 'string'],
            'caption'     => ['required', 'string'],
            'email'    => ['required', 'email'],
            'terms'    => ['required'],
        ]);

        $file = $request->file('picture');
        $name = '/pictures/' . uniqid() . '.' . $file->extension();
        $file->storePubliclyAs('public', $name);
        $data['picture'] = $name;
        $data['published'] = 0;

        $upload = PhotoUploads::create($data);

        return new PhotoUploadsResource($upload);
    }
    public function published(Request $request)
    {
        return response(PhotoUploads::where('published', '=', 1)->get(['id', 'caption', 'picture', 'name'])->jsonSerialize(), Response::HTTP_OK);
    }
}
