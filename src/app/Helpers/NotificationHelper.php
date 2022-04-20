<?php

namespace App\Helpers;

use App\Models\Enum\NotificationType;
use App\Repositories\NotificationRepository;
use App\Services\NotificationsService;

class NotificationHelper
{
    public static function info(string $title = '', string $content = ''): void
    {
        self::notify([
            'title' => $title,
            'content' => $content,
            'type' => NotificationType::INFO
        ]);
    }

    public static function warning(string $title = '', string $content = ''): void
    {
        self::notify([
            'title' => $title,
            'content' => $content,
            'type' => NotificationType::WARNING
        ]);
    }

    public static function notify(array $data): void
    {
        $service = new NotificationsService(new NotificationRepository());

        $service->create($data);
    }
}
