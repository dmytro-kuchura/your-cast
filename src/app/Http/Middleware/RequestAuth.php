<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class RequestAuth
{
    const HEADER_CSRF_TOKEN = 'X-CSRF-TOKEN';
    const REQUEST_CSRF_TOKEN = 'token';

    public function handle(Request $request, Closure $next)
    {
        $header = trim($request->headers->get(self::HEADER_CSRF_TOKEN));
        $value = trim($request->get(self::REQUEST_CSRF_TOKEN));

        if (strcmp($header, $value) !== 0) {
            Log::error('Not valid request', [json_encode($request->all())]);
            return response()->json(['message' => 'Not valid request!'], Response::HTTP_BAD_REQUEST);
        }

        return $next($request);
    }
}
