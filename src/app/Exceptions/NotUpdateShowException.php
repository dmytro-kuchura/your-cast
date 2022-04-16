<?php

namespace App\Exceptions;

use RuntimeException;

class NotUpdateShowException extends RuntimeException
{
    protected $message = 'Show can\'t update!';
}
