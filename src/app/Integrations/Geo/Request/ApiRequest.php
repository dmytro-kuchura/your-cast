<?php

namespace App\Integrations\Geo\Request;

abstract class ApiRequest
{
    abstract public function getMethod(): string;

    abstract public function getQueryUrl(): string;

    abstract public function getBody(): ?array;
}
