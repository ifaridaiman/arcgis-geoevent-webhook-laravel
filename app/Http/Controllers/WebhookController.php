<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Illuminate\Http\Response;
use BeyondCode\LaravelWebSockets\Facades\WebSocketsRouter;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function handle(Request $request)
    {
        $payload = $request->getContent();

        if($payload !== null)
        {
            $decodePayload = json_decode($payload);
            
            if(is_array($decodePayload))
            {
                foreach($decodePayload as $payloadItem)
                {
                    
                    // broadcast(new WebhookEvent($payloadItem))->to('webhook');
                    Log::info(json_encode($payloadItem));
                }
            }else if (is_object($decodePayload))
            {
                // app('websockets.server')->broadcastToChannel('webhook', [
                //     'payload' => $decodePayload,
                // ]);
                Log::notice(json_encode($decodePayload));
            }else
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
