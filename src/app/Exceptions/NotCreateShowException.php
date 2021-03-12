<?php

namespace App\Exceptions;

use RuntimeException;

class NotCreateShowException extends RuntimeException
{
    protected $message = 'Show can\'t create!';
}
