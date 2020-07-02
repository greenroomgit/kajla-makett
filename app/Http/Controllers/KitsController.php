<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Kits;

class KitsController extends Controller
{
    public function list(Request $request)
    {
        return response(Kits::get([
          'id',
          'name',
          'thumbnail',
          'a5',
          'a2',
          'a1',
          'a6',
          'a4',
          'iframe'])->jsonSerialize(), Response::HTTP_OK);
    }
}
