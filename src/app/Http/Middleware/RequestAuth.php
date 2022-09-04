<?php

namespace App\Http\Middleware;

use App\Helpers\ElasticLoggerHelper;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RequestAuth
{
    const HEADER_CSRF_TOKEN = 'X-CSRF-TOKEN';
    const REQUEST_CSRF_TOKEN = 'token';

    public function handle(Request $request, Closure $next)
    {
        $header = trim($request->headers->get(self::HEADER_CSRF_TOKEN));
        $value = trim($request->get(self::REQUEST_CSRF_TOKEN));

        if (strcmp($header, $value) !== 0) {
            ElasticLoggerHelper::error('Not valid request', [
                'HEADERS' => $request->headers->all(),
                'REQUEST' => $request->all(),
            ]);

            return response()->json(['message' => 'Not valid request!'], Response::HTTP_BAD_REQUEST);
        }

        return $next($request);
    }
}
