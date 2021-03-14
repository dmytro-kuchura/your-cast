<?php

namespace App\Exceptions;

use RuntimeException;

class ImageUploadException extends RuntimeException
{
    protected $message = 'Image can\'t upload!';
}
