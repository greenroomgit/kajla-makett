<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\PhotoUploads;
use App\Http\Resources\PhotoUploadsResource;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class PhotoUploadsController extends Controller
{
    public function upload(Request $request)
    {
        $rules = [
            'picture'   => ['required', 'image', 'max:6144'],
            'name'     => ['required', 'string'],
            'caption'     => ['required', 'string'],
            'email'    => ['required', 'email'],
            'terms'    => ['required'],
        ];

        $customMessages = [
            "picture.max" => "A maximális megengedett képméret: 6MB."
        ];

        $data =  $this->validate($request, $rules, $customMessages);

        $file = $request->file('picture');
        
        $thumbPath = '/pictures/' . uniqid() . '.' . $file->extension();
        $thumbnail = $file->storePubliclyAs('public', $thumbPath);
        $thumbnailImage = Image::make(Storage::disk('local')->path($thumbnail));
        $thumbnailImage->resize((400), null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $thumbnailImage->save();

        $wmPath = '/pictures/' . uniqid() . '.' . $file->extension();
        $watermarked = $file->storePubliclyAs('public', $wmPath);
        $watermarkedImage = Image::make(Storage::disk('local')->path($watermarked));
        $waterMarkUrl = public_path('assets/images/hol_vagy_kajla_logo_szines.png');
        $waterMark = Image::make($waterMarkUrl);
        $waterMark->resize(($watermarkedImage->width() / 5), null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $watermarkedImage->insert($waterMark, 'bottom-right', 5, 5);
        $watermarkedImage->save();


        $data['picture'] = $wmPath;
        $data['thumb'] = $thumbPath;
        $data['published'] = 0;

        $upload = PhotoUploads::create($data);

        return new PhotoUploadsResource($upload);
    }
    public function published(Request $request)
    {
        return response(PhotoUploads::where('published', '=', 1)->orderBy('created_at', 'DESC')->get(['id', 'caption', 'picture', 'thumb', 'name'])->jsonSerialize(), Response::HTTP_OK);
    }
}
