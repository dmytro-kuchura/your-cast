<?php

namespace App\Http\Controllers\Api;

use App\Actions\ShowAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Show\CreateShowRequest;
use App\Http\Resources\ShowResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ShowController extends Controller
{
    /** @var ShowAction */
    private ShowAction $action;

    public function __construct(ShowAction $showAction)
    {
        $this->action = $showAction;
    }

    public function info(int $id): JsonResponse
    {
        return $this->returnResponse([]);
    }

    public function create(CreateShowRequest $request): JsonResponse
    {
        $show = $this->action->createShow($request->all());

        return $this->returnResponse([
            'created' => true,
            'show' => new ShowResource($show),
        ], Response::HTTP_CREATED);
    }

    public function update(int $id, CreateShowRequest $request): JsonResponse
    {
        $show = $this->action->updateShow($id, $request->all());

        return $this->returnResponse([
            'created' => true,
            'show' => new ShowResource($show),
        ], Response::HTTP_OK);
    }

    public function delete(int $id): JsonResponse
    {
        return $this->returnResponse([]);
    }
}
