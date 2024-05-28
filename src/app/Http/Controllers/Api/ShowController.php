<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Show\CreateShowRequest;
use App\Http\Requests\Show\UpdateShowRequest;
use App\Http\Resources\ShowResource;
use App\Services\ShowService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    private ShowService $service;

    public function __construct(ShowService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *     path="/api/v1/show/{id}",
     *     summary="Get show info",
     *     tags={"Shows"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Show ID",
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
    public function info(int $id): JsonResponse
    {
        $result = $this->service->getShowInfo($id);
        return $this->returnResponse([
            'result' => $result
        ]);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/show/{id}/short",
     *     summary="Get show info",
     *     tags={"Shows"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Show ID",
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
    public function shortInfo(int $id): JsonResponse
    {
        $result = $this->service->getShortShowInfo($id);
        return $this->returnResponse([
            'result' => $result
        ]);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/show/short",
     *     summary="Get user short shows list",
     *     tags={"Shows"},
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
    public function short(): JsonResponse
    {
        $userId = Auth::id();
        $result = $this->service->getAllUserShowShort($userId);
        return $this->returnResponse([
            'result' => $result
        ]);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/show/list",
     *     summary="Get user shows",
     *     tags={"Shows"},
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
     *     path="/api/v1/show/create",
     *     summary="Create new show",
     *     tags={"Shows"},
     *     @OA\RequestBody(
     *        required=true,
     *        description="Create show",
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
        $this->service->createShow($request->all());
        return $this->returnResponse([
            'created' => true,
        ], Response::HTTP_CREATED);
    }

    /**
     * @OA\Put(
     *     path="/api/v1/show/create",
     *     summary="Update show",
     *     tags={"Shows"},
     *     @OA\RequestBody(
     *        required=true,
     *        description="Update show",
     *        @OA\JsonContent(
     *           required={"title","format","timezone","language","explicit","category","show_id"},
     *           @OA\Property(property="show_id", type="string", example="1"),
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
    public function update(int $id, UpdateShowRequest $request): JsonResponse
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
