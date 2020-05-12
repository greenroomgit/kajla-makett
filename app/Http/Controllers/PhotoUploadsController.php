<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
