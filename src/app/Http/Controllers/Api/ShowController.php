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
        return $this->returnResponse([]);
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

    public function list(int $userId)
    {
        $result = $this->service->getAllUserShow($userId);

        return $this->returnResponse([
            'result' => $result
        ]);
    }

    public function delete(int $id): JsonResponse
    {
        return $this->returnResponse([]);
    }
}
