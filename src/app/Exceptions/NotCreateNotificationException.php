<?php

namespace App\Exceptions;

use RuntimeException;

class NotCreateNotificationException extends RuntimeException
{
    protected $message = 'Notification can\'t create!';
}
