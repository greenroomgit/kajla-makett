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

        $data['token'] = bin2hex(random_bytes(50));
        $kitRequest = KitRequests::create($data);
        $url = \App::make('url')->to('/verify-request?'.$data['token']);

        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
        $beautymail->send('emails.verify', ['url' => $url], function ($message) use ($kitRequest){
            $message
            ->from('donotreply@kajla.hu')
            ->to($kitRequest->email)
            ->subject('Ellenőrzés');
        });


        return response($kitRequest->jsonSerialize(), Response::HTTP_OK);
    }

    public function verifyEmail(Request $request)
    {
        $token = $request->input('token');
        $req = KitRequests::where('token', '=', $token)->first();

        if ($req) {

            $req->verified_at = new \DateTime;
            $req->save();
            // $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
            // $beautymail->send('emails.success-request', ['token' => $token], function ($message) use ($req) {
            //     $message
            //     ->from('donotreply@kajla.hu')
            //     ->to($req->email)
            //     ->subject('Köszönjük az igénylést!');
            // });            
            return response()->json([], Response::HTTP_OK);

            } else {
            return response()->json(['error' => 'Hibás érvényesítő link'], 403);
        }
        dump($req);
        exit;

        
    }
}
