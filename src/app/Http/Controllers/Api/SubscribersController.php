<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Subscribers\SubscribersRequest;
use App\Services\SubscribeService;
use Illuminate\Http\JsonResponse;

class SubscribersController extends Controller
{
    public SubscribeService $subscribeService;

    public function __construct(SubscribeService $subscribeService)
    {
        $this->subscribeService = $subscribeService;
    }

    /**
     * @OA\Post(
     *     path="/api/v1/subscribers-form",
     *     summary="Subscribers Form",
     *     tags={"Subscribers Form"},
     *     @OA\RequestBody(
     *        required=true,
     *        description="Subscribers Form data",
     *        @OA\JsonContent(
     *           @OA\Property(property="email", type="email", example="example@domain.com"),
     *        ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error"
     *     ),
     *     @OA\Response(
     *         response="422",
     *         description="Error validation"
     *     )
     * )
     */
    public function subscribersForm(SubscribersRequest $request): JsonResponse
    {
        if ($this->subscribeService->validate($request->get('email'))) {
            return $this->returnResponse([
                'error' => 'This email already exist.'
            ], 422);
        }
        $this->subscribeService->createSubscribe($request->all());
        return $this->returnResponse([
            'message' => 'You successfully subscribe to updates!',
            'form' => 'subscribers',
        ]);
    }
}
