<?php

namespace App\Services;

use App\Repositories\LogsRepository;
use Illuminate\Http\Request;

class LogService
{
    /** @var LogsRepository */
    private LogsRepository $repository;

    /** @var array */
    private array $body;

    public function __construct(LogsRepository $repository)
    {
        $this->repository = $repository;
        $this->body = [];
    }

    public function save(string $message, string $level, Request $request): void
    {
        $this->prepareBody($request);

        if (is_array($message)) {
            $this->body['message'] = json_encode($message);
        } else {
            $this->body['message'] = $message;
        }

        $this->body['level'] = $level;

        $this->repository->store($this->body);
    }

    private function prepareBody(Request $request): void
    {
        $headers = [];

        foreach ($request->header() as $key => $value) {
            $headers[$key] = $value[0];
        }

        $this->body['request_header'] = json_encode($headers);
        $this->body['request_body'] = json_encode($request->getContent());
        $this->body['remote_addr'] = $request->ip();
        $this->body['user_agent'] = $request->server('HTTP_USER_AGENT');
    }
}
