<?php

namespace App\Exceptions;

use RuntimeException;

class NotCreateAnalyticException extends RuntimeException
{
    protected $message = 'Analytics can\'t create!';
}
