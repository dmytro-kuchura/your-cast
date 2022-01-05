<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Http\Requests\Auth\UpdatePasswordRequest;
use App\Http\Resources\UserResource;
use App\Mail\ResetPasswordMail;
use App\Mail\UpdatePasswordMail;
use App\Services\AuthService;
use App\Services\IpHistoryService;
use App\Services\LogService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public AuthService $authService;

    public LogService $logService;

    public IpHistoryService $ipHistoryService;

    public function __construct(
        AuthService $authService,
        LogService $logService,
        IpHistoryService $ipHistoryService
    )
    {
        $this->authService = $authService;
        $this->logService = $logService;
        $this->ipHistoryService = $ipHistoryService;
    }

    /**
     * @OA\Post(
     *     path="/api/v1/login",
     *     summary="User login",
     *     tags={"Auth"},
     *     @OA\RequestBody(
     *        required=true,
     *        description="Pass user credentials",
     *        @OA\JsonContent(
     *           @OA\Property(property="email", type="email", example="example@domain.com"),
     *           @OA\Property(property="password", type="string", example="qwerty123"),
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
    public function login(LoginRequest $request): JsonResponse
    {
        $user = Auth::attempt($request->all(), $request->get('remember'));

        if (!$user) {
            return $this->returnResponse([
                'error' => 'Sorry we couldn\'t sign you in with those details.'
            ], 422);
        }

        $this->ipHistoryService->saveHistory($request->user());

        return $this->returnResponse([
            'user' => new UserResource($request->user()),
            'access_token' => $this->authService->generate(Auth::id()),
            'token_type' => 'bearer',
        ]);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/register",
     *     summary="User register",
     *     tags={"Auth"},
     *     @OA\RequestBody(
     *        required=true,
     *        description="Pass user credentials",
     *        @OA\JsonContent(
     *           @OA\Property(property="name", type="email", example="User"),
     *           @OA\Property(property="email", type="email", example="example@domain.com"),
     *           @OA\Property(property="password", type="string", example="qwerty123"),
     *           @OA\Property(property="password_confirmation", type="string", example="qwerty123"),
     *        ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable entity"
     *     ),
     * )
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $this->authService->registration($request->all());

        $token = Auth::attempt($request->only(['email', 'password']));

        if (!$token) {
            return $this->returnResponse([
                'success' => false,
                'error' => 'Not found.'
            ], Response::HTTP_NOT_FOUND);
        }

        return $this->returnResponse([
            'user' => new UserResource(Auth::user()),
            'access_token' => $this->authService->generate(Auth::id())
        ], Response::HTTP_CREATED);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/reset-password",
     *     summary="User reset password",
     *     tags={"Auth"},
     *     @OA\RequestBody(
     *        required=true,
     *        description="Pass user credentials",
     *        @OA\JsonContent(
     *           required={"email"},
     *           @OA\Property(property="email", type="email", example="example@domain.com"),
     *        ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable entity"
     *     ),
     * )
     */
    public function reset(ResetPasswordRequest $request): JsonResponse
    {
        $email = $request->get('email');

        $token = $this->authService->reset($email);

        if ($token) {
            Mail::to($email)->send(new ResetPasswordMail($token));

            return $this->returnResponse([
                'message' => 'Successfully sent email.'
            ]);
        }

        return $this->returnResponse([
            'message' => 'user with this email not found.'
        ], 404);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/update-password",
     *     summary="User update password",
     *     tags={"Auth"},
     *     @OA\RequestBody(
     *        required=true,
     *        description="Pass user credentials",
     *        @OA\JsonContent(
     *           required={"token", "password", "password_confirmation"},
     *           @OA\Property(property="token", type="string", example="aasd77667asdhkjasda-sdaasd"),
     *           @OA\Property(property="password", type="string", example="qwerty123"),
     *           @OA\Property(property="password_confirmation", type="string", example="qwerty123"),
     *        ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable entity"
     *     ),
     * )
     */
    public function update(UpdatePasswordRequest $request): JsonResponse
    {
        $updatedUser = $this->authService->update($request->all());

        if ($updatedUser) {
            Mail::to($updatedUser->email)->send(new UpdatePasswordMail($updatedUser));

            return $this->returnResponse([
                'message' => 'Successfully update password.'
            ]);
        }

        return $this->returnResponse([
            'message' => 'Update password not completed.'
        ], 404);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/logout",
     *     summary="User logout",
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
    public function logout(): JsonResponse
    {
        $this->authService->setExpired(Auth::id());

        Auth::logout();

        return $this->returnResponse([
            'message' => 'Successfully logged out'
        ]);
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
    public function profile(): JsonResponse
    {
        return $this->returnResponse([
            'user' => new UserResource(Auth::user()),
            'access_token' => $this->authService->findTokenByUser(Auth::id()),
            'token_type' => 'bearer',
            'has_show' => true,
        ]);
    }
}
