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
     *     path="/api/v1/episodes",
     *     summary="Get user episodes",
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
    public function list(int $userId): JsonResponse
    {
        $result = $this->service->getAllUserPodcast($userId);

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
}
