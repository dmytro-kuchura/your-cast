<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;

class ElasticLoggerHelper
{
    public static function info($message = null, array $context = []): void
    {
        Log::info($message, $context);
    }

    public static function error($message = null, array $context = []): void
    {
        Log::error($message, $context);
    }

    public static function warning($message = null, array $context = []): void
    {
        Log::warning($message, $context);
    }

    public static function afterCreating(bool $success = true, array $context = []): void
    {
        if ($success === true) {
            self::info('The record is saved in database.', $context);
        }
        self::error('The record can not saved in database.', $context);
    }

    public static function afterUpdating(bool $success = true, array $context = []): void
    {
        if ($success === true) {
            self::info('The record is updated in database.', $context);
        }
        self::error('The record can not updated in database.', $context);
    }

    public static function afterDeleting(bool $success = true, array $context = []): void
    {
        if ($success === true) {
            self::info('The record is deleted from database.', $context);
        }
        self::error('The record can not deleted from database.', $context);
    }
}
