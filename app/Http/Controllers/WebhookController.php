<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Illuminate\Http\Response;


class WebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $payload = $request->json()->all();

        // return response()->json($payload, Response::HTTP_OK);
        // return response()->json(['message' => 'Data updated successfully']);

        return DataTables::of($payload)->make(true);
    }
}
