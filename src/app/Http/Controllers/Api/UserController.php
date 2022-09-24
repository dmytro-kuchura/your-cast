<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserPermissionsRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *     path="/api/v1/user",
     *     summary="Users list",
     *     tags={"Users"},
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
        $users = $this->service->usersList();

        return $this->returnResponse([
            'result' => $users,
        ]);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/user/{id}",
     *     summary="User detail",
     *     tags={"Users"},
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
    public function detail(int $id): JsonResponse
    {
        $user = $this->service->usersDetail($id);

        return $this->returnResponse([
            'result' => $user,
        ]);
    }

    public function permissions(UserPermissionsRequest $request): JsonResponse
    {
        $result = $this->service->updatePermissions($request->get('user_id'), $request->get('permissions'));

        return $this->returnResponse([
            'result' => $result,
        ]);
    }
}
