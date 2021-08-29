<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Episode\CreateEpisodeRequest;
use App\Services\EpisodesService;
use Illuminate\Http\JsonResponse;

class EpisodeController extends Controller
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

    /**
     * @OA\Get(
     *     path="/api/v1/profile",
     *     summary="User profile",
     *     tags={"Auth"},
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
    public function list(int $userId): JsonResponse
    {
        $result = $this->service->getAllUserPodcast($userId);

        return $this->returnResponse([
            'result' => $result
        ]);
    }

    public function create(CreateEpisodeRequest $request): JsonResponse
    {
        $this->service->createEpisode($request->all());

        return $this->returnResponse([
            'success' => true
        ]);
    }
}
