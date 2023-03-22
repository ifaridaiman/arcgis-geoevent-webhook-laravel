<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function handle(Request $request)
    {
        // declare the routes at routes/web.php
        // need to disabled the csrf, go to app/Http/Middleware/VerifyCsrfToken.php and add the path there.
        $payload = $request->getContent();

        if($payload !== null)
        {
            $decodePayload = json_decode($payload);
            
            if (is_object($decodePayload))
            {
                //Output from Geo Event is in here
                // add more process here, either to broadcast or to insert into db.
                Log::notice(json_encode($decodePayload));
            }else if(is_array($decodePayload))
            {
                //for precautions if geoevent pass as array
                foreach($decodePayload as $payloadItem)
                {
                    //Output from Geo Event is in here
                    // add more process here, either to broadcast or to insert into db.
                    

                    // broadcast(new WebhookEvent($payloadItem))->to('webhook');
                    Log::info(json_encode($payloadItem));
                }
            } else
            {
                Log::warning('Invalid payload format');
                return response('Invalid payload format', 400);
            }
        }else
        {
            Log::warning('Payload is null');
            return response('Payload is null', 400);
        }
        return response('OK',200);
    }
}
