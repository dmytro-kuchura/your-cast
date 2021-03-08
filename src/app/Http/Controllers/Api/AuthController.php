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
use App\Services\LogService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public AuthService $authService;

    public LogService $logService;

    public function __construct(AuthService $authService, LogService $logService)
    {
        $this->authService = $authService;
        $this->logService = $logService;
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $user = Auth::attempt($request->all(), $request->get('remember'));

        if (!$user) {
            return $this->returnResponse([
                'error' => 'Sorry we couldn\'t sign you in with those details.'
            ], 422);
        }

        return $this->returnResponse([
            'user' => new UserResource($request->user()),
            'access_token' => $this->authService->generate(Auth::id()),
            'token_type' => 'bearer',
        ]);
    }

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

    public function logout(): JsonResponse
    {
        Auth::logout();

        $this->authService->setExpired(Auth::id());

        return $this->returnResponse([
            'message' => 'Successfully logged out'
        ]);
    }

    public function profile(): JsonResponse
    {
        return $this->returnResponse([
            'user' => new UserResource(Auth::user()),
            'access_token' => $this->authService->findTokenByUser(Auth::id()),
            'token_type' => 'bearer',
        ]);
    }
}
