<?php

namespace App\Http\Middleware;

use App\Services\LogService;
use Closure;

class Logger
{
    /** @var LogService */
    public LogService $logService;

    public function __construct(LogService $logService)
    {
        $this->logService = $logService;
    }

    public function handle($request, Closure $next)
    {
        $this->logService->save('Income request', 'info', $request);

        return $next($request);
    }
}
