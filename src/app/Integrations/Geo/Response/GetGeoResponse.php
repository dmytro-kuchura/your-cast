<?php

namespace App\Integrations\Geo\Response;

class GetGeoResponse extends ApiResponse
{

    public function getResponseStatus(): string
    {
        return $this->response['status'];
    }

    public function getResponseResult(): ?array
    {
        return $this->response;
    }

    public function getCountry(): ?string
    {
        return $this->response['country'] ?? null;
    }

    public function getCountryCode(): ?string
    {
        return $this->response['countryCode'] ?? null;
    }

    public function getCity(): ?string
    {
        return $this->response['city'] ?? null;
    }
}
