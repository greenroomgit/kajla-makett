<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\GuideSteps;

class HomeController extends Controller
{
    public function steps()
    {
        return response(GuideSteps::all()->jsonSerialize(), Response::HTTP_OK);
    }
}
