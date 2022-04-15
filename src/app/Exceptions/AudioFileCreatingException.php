<?php

namespace App\Exceptions;

use RuntimeException;

class AudioFileCreatingException extends RuntimeException
{
    protected $message = 'Error while creating audio file.';
}
