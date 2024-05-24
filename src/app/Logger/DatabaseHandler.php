<?php

namespace App\Logger;

use App\Models\LogMessage;
use Monolog\Handler\AbstractProcessingHandler;

class DatabaseHandler extends AbstractProcessingHandler
{
    protected function write(\Monolog\LogRecord $record): void
    {
        LogMessage::create([
            'level' => $record['level'],
            'level_name' => $record['level_name'],
            'message' => $record['message'],
            'logged_at' => $record['datetime'],
            'context' => json_encode($record['context'], JSON_UNESCAPED_SLASHES),
            'extra' => json_encode($record['extra'], JSON_UNESCAPED_SLASHES),
        ]);
    }
}
