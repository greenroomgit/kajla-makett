<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\KitRequests;

class KitRequestController extends Controller
{
    public function create(Request $request)
    {
        $rules = [
            'name'     => ['required', 'string'],
            'email'    => ['required', 'email', 'unique:App\KitRequests,email'],
            'city'    => ['required', 'string'],
            'address'    => ['required', 'string'],
            'postal'    => [
              'required',
              'postal_code:HU',
            ],
        ];

        $customMessages = [
            "email.unique" => "Ezzel az e-mail címmel már igényeltél makett csomagot."
        ];

        $data =  $this->validate($request, $rules, $customMessages);


        $data['token'] = bin2hex(random_bytes(50));
        $kitRequest = KitRequests::create($data);
        $url = \App::make('url')->to('/verify-request?token='.$data['token']);

        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
        $beautymail->send('emails.verify', ['url' => $url], function ($message) use ($kitRequest) {
            $message
            ->from('makett@kajla.hu', 'Kajla Makett')
            ->to($kitRequest->email)
            ->subject('Igénylés véglegesítése');
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
