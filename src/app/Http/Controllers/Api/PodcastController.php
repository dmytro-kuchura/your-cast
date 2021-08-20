<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\EpisodesService;
use Illuminate\Http\JsonResponse;

class PodcastController extends Controller
{
    /** @var EpisodesService */
    private EpisodesService $service;

    public function __construct(EpisodesService $service)
    {
        $this->service = $service;
    }

    public function info(int $id): JsonResponse
    {
        // TODO not completed
        return $this->returnResponse([]);
    }

    public function list(int $userId): JsonResponse
    {
        $result = $this->service->getAllUserPodcast($userId);

        return $this->returnResponse([
            'result' => $result
        ]);
    }
}
