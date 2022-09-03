<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class RequestLogger
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $content = json_decode($response->getContent());

        $log = [
            'URI' => $request->getUri(),
            'METHOD' => $request->getMethod(),
            'REQUEST_BODY' => $request->all(),
            'RESPONSE' => $content
        ];

        Log::info('Income request', [json_encode($log)]);

        return $response;
    }
}
