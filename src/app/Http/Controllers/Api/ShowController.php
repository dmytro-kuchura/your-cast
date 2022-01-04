<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Show\CreateShowRequest;
use App\Http\Resources\ShowResource;
use App\Services\ShowService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    /** @var ShowService */
    private ShowService $service;

    public function __construct(ShowService $service)
    {
        $this->service = $service;
    }

    public function info(int $id): JsonResponse
    {
        $result = $this->service->getShowInfo($id);
        return $this->returnResponse([
            'result' => $result
        ]);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/shows/list/{id}",
     *     summary="Get user shows",
     *     tags={"Show"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="User ID",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
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
    public function list(): JsonResponse
    {
        $userId = Auth::id();

        $result = $this->service->getAllUserShow($userId);
        return $this->returnResponse([
            'result' => $result
        ]);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/shows/create",
     *     summary="Get user shows",
     *     tags={"Show"},
     *     @OA\RequestBody(
     *        required=true,
     *        description="Pass user credentials",
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
    public function create(CreateShowRequest $request): JsonResponse
    {
        $show = $this->service->createShow($request->all());

        return $this->returnResponse([
            'created' => true,
            'show' => new ShowResource($show),
        ], Response::HTTP_CREATED);
    }

    public function update(int $id, CreateShowRequest $request): JsonResponse
    {
        $show = $this->service->updateShow($id, $request->all());

        return $this->returnResponse([
            'created' => true,
            'show' => new ShowResource($show),
        ], Response::HTTP_OK);
    }

    public function delete(int $id): JsonResponse
    {
        // TODO not completed
        return $this->returnResponse([]);
    }
}
