<?php

namespace App\Http\Middleware;

use App\Helpers\LoggerHelper;
use Closure;

class RequestLogger
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        LoggerHelper::info('Income request', [
            'URI' => $request->getUri(),
            'METHOD' => $request->getMethod(),
            'REQUEST_BODY' => $request->all(),
            'RESPONSE' => $response->getContent()
        ]);
        return $response;
    }
}
