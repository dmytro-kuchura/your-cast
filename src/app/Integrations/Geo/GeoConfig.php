<?php

namespace App\Integrations\Geo;

class GeoConfig
{
    public string $baseUri = 'http://ip-api.com/json/';

    public function getBaseUri(): string
    {
        return $this->baseUri;
    }
}
