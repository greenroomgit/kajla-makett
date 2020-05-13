<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\KitRequests;

class KitRequestController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->validate([
            'name'     => ['required', 'string'],
            'email'    => ['required', 'email'],
            'city'    => ['required', 'string'],
            'address'    => ['required', 'string'],
            'postal'    => [
              'required',
              'postal_code:HU',
            ],
        ]);


        $kitRequest = KitRequests::create($data);

        return response($kitRequest->jsonSerialize(), Response::HTTP_OK);
    }
}
