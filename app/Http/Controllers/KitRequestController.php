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

        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
        $beautymail->send('emails.published', ['token' => $data['token']], function ($message) use ($kitRequest){
            $message
            ->from('donotreply@kajla.hu')
            ->to($kitRequest->email)
            ->subject('Ellenőrzés');
        });


        return response($kitRequest->jsonSerialize(), Response::HTTP_OK);
    }

    public function verifyEmail($token)
    {
        $req = KitRequests::where('token', '=', $token)->first();

        if ($req) {

            $req->verified_at = new \DateTime;
            $req->save();
            $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
            $beautymail->send('emails.published', ['token' => $token], function ($message) {
                $message
                ->from('donotreply@kajla.hu')
                ->to($req->email)
                ->subject('Köszönjük az igénylést!');
            });
            } else {
            return response('ERROR', Response::HTTP_OK);
        }
        dump($req);
        exit;

        
    }
}
