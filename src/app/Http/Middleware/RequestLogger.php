<?php

namespace App\Http\Middleware;

use App\Helpers\ElasticLoggerHelper;
use Closure;

class RequestLogger
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $content = json_decode($response->getContent());

        ElasticLoggerHelper::info('Income request', [
            'URI' => $request->getUri(),
            'METHOD' => $request->getMethod(),
            'REQUEST_BODY' => $request->all(),
            'RESPONSE' => $content
        ]);

        return $response;
    }
}
