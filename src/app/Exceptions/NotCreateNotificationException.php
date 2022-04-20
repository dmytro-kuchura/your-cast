<?php

namespace App\Exceptions;

use RuntimeException;

class NotCreateNotificationException extends RuntimeException
{
    protected $message = 'NotificationController can\'t create!';
}
