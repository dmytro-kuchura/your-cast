<?php

namespace App\Integrations\Geo\Exception;

use RuntimeException;

class CommunicationErrorException extends RuntimeException
{
    protected $message = 'Error communication!';
}
