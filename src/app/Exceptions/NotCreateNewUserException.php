<?php

namespace App\Exceptions;

class NotCreateNewUserException extends CustomException
{
    protected $message = 'User can\'t register, try again later!';
}
