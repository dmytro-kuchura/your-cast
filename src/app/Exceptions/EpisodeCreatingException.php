<?php

namespace App\Exceptions;

use RuntimeException;

class EpisodeCreatingException extends RuntimeException
{
    protected $message = 'Error while creating episode.';
}
