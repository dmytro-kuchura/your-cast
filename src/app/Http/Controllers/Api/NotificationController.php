<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationResource;
use App\Services\NotificationsService;
use Illuminate\Http\JsonResponse;

class NotificationController extends Controller
{
    private NotificationsService $service;

    public function __construct(NotificationsService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *     path="/api/v1/notifications/unread",
     *     summary="Get unread notifications",
     *     tags={"Notifications"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response="401",
     *         description="Unauthorized user"
     *     )
     * )
     */
    public function unread(): JsonResponse
    {
        $result = $this->service->getUnread();

        return $this->returnResponse([
            'result' => NotificationResource::collection($result),
        ]);
    }
}
