<?php

namespace App\Integrations\Geo;

use App\Integrations\Geo\Exception\CommunicationErrorException;
use App\Integrations\Geo\Request\ApiRequest;
use App\Integrations\Geo\Response\ApiResponse;
use App\Integrations\Geo\Response\ErrorApiResponse;
use Illuminate\Support\Facades\Http;

class ApiCommunicator
{
    protected Http $httpClient;

    protected string $baseUri;

    public function __construct(GeoConfig $config)
    {
        $this->baseUri = $config->getBaseUri();
        $this->httpClient = new Http();
    }

    public function send(ApiRequest $request): ApiResponse
    {
        $url = $this->baseUri . $request->getQueryUrl();
        try {
            $response = Http::timeout(3)
                ->retry(2, 200)
                ->withHeaders([
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ])->send($request->getMethod(), $url, $request->getBody() ? ['json' => $request->getBody()] : []);
            if ($response->successful()) {
                return $this->buildResponse($request, $response->json());
            } else {
                return $this->buildErrorResponse($response->json());
            }
        } catch (\Throwable $exception) {
            throw new CommunicationErrorException($exception->getMessage());
        }
    }

    private function buildResponse(ApiRequest $request, array $data): ApiResponse
    {
        $requestClassName = get_class($request);
        $responseClass = preg_replace('~Request((?=\\\)|(?=$))~', 'Response', $requestClassName);
        return new $responseClass($data);
    }

    private function buildErrorResponse(array $data): ApiResponse
    {
        return new ErrorApiResponse($data);
    }
}
