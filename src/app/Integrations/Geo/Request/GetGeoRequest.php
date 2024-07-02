<?php

namespace App\Integrations\Geo\Request;

class GetGeoRequest extends ApiRequest
{
    const METHOD = 'GET';

    const URL_PARAMS = '?fields=status,message,country,countryCode,city';

    private string $ip;

    public function __construct(string $ip)
    {
        $this->ip = $ip;
    }

    public function getMethod(): string
    {
        return self::METHOD;
    }

    public function getQueryUrl(): string
    {
        return $this->ip . self::URL_PARAMS;
    }

    public function getBody(): ?array
    {
        return null;
    }
}
