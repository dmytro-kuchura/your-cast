<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Episode\CreateEpisodeRequest;
use App\Http\Requests\Episode\UpdateEpisodeRequest;
use App\Http\Requests\Episode\UpdateEpisodeStatusRequest;
use App\Services\EpisodesService;
use Illuminate\Http\JsonResponse;

class EpisodeController extends Controller
{
    private EpisodesService $service;

    public function __construct(EpisodesService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *     path="/api/v1/episodes/{episodeId}",
     *     summary="Get episode detail",
     *     tags={"Episodes"},
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
    public function info(int $id): JsonResponse
    {
        $result = $this->service->getEpisode($id);
        return $this->returnResponse([
            'result' => $result
        ]);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/episodes/create",
     *     summary="Create new episode",
     *     tags={"Episodes"},
     *     @OA\RequestBody(
     *        required=true,
     *        description="Create new episode",
     *        @OA\JsonContent(
     *           required={"title","format","timezone","language","explicit","category"},
     *           @OA\Property(property="title", type="string", example="Exapmle show name"),
     *           @OA\Property(property="description", type="string", example="Exapmle show description"),
     *           @OA\Property(property="artwork", type="string", example=""),
     *           @OA\Property(property="format", type="string", example="episodic"),
     *           @OA\Property(property="timezone", type="string", example="Etc/GMT"),
     *           @OA\Property(property="language", type="string", example="en"),
     *           @OA\Property(property="explicit", type="boolean", example="true"),
     *           @OA\Property(property="category", type="string", example="sport"),
     *           @OA\Property(property="author", type="string", example="Author name"),
     *           @OA\Property(property="podcast_owner", type="string", example="example author"),
     *           @OA\Property(property="email_owner", type="string", example="example@domain.com"),
     *           @OA\Property(property="copyright", type="string", example="copyright"),
     *        ),
     *     ),
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
    public function create(CreateEpisodeRequest $request): JsonResponse
    {
        $this->service->createEpisode($request->all());
        return $this->returnResponse([
            'success' => true
        ]);
    }

    /**
     * @OA\Patch(
     *     path="/api/v1/episodes/{episodeId}",
     *     summary="Update episode",
     *     tags={"Episodes"},
     *     @OA\RequestBody(
     *        required=true,
     *        description="Update episode",
     *        @OA\JsonContent(
     *           required={"title","format","timezone","language","explicit","category"},
     *           @OA\Property(property="artwork", type="string", example=""),
     *           @OA\Property(property="explicit", type="boolean", example="true")
     *        ),
     *     ),
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
    public function update(int $id, UpdateEpisodeRequest $request): JsonResponse
    {
        $this->service->updateEpisode($request->all(), $id);
        return $this->returnResponse([
            'success' => true
        ]);
    }

    /**
     * @OA\Patch(
     *     path="/api/v1/episodes/{episodeId}",
     *     summary="Update episode status",
     *     tags={"Episodes"},
     *     @OA\RequestBody(
     *        required=true,
     *        description="Update episode status",
     *        @OA\JsonContent(
     *           required={"status"},
     *           @OA\Property(property="status", type="string", example="draft"),
     *        ),
     *     ),
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
    public function status(int $id, UpdateEpisodeStatusRequest $request): JsonResponse
    {
        $this->service->updateEpisodeStatus($request->get('status'), $id);
        return $this->returnResponse([
            'success' => true
        ]);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/episodes/show/{showId}/list",
     *     summary="Get show episodes",
     *     tags={"Episodes"},
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
    public function showEpisodes(int $showId): JsonResponse
    {
        $result = $this->service->getShowEpisodes($showId);
        return $this->returnResponse([
            'result' => $result
        ]);
    }
}
