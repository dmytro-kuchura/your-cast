<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Show\CreateShowRequest;
use App\Http\Resources\ShowResource;
use App\Services\ShowService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

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
        // TODO not completed
        return $this->returnResponse([]);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/list/{id}",
     *     summary="User created shows",
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
    public function list(int $userId): JsonResponse
    {
        $result = $this->service->getAllUserShow($userId);

        return $this->returnResponse([
            'result' => $result
        ]);
    }

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
