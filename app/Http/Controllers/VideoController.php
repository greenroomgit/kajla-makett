<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Videos;

class VideoController extends Controller
{
    public function index()
    {
        return response(Videos::orderBy('created_at', 'DESC')->take(4)->get()->jsonSerialize(), Response::HTTP_OK);
    }
}
