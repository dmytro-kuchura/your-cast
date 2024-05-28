<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @OA\Info(
     *     version="1.0",
     *     title="Your Cast API"
     * )
     */
    public function returnResponse(array $response, $status_code = 200, array $headers = []): JsonResponse
    {
        $response['success'] = true;
        return response()->json($response, $status_code, $headers, JSON_UNESCAPED_UNICODE);
    }

    public function apiResponse(array $response, $status_code = 200, array $headers = []): JsonResponse
    {
        return response()->json(['content' => $response], $status_code, $headers, JSON_UNESCAPED_UNICODE);
    }

    public function apiErrorResponse(array $response, $status_code = 200, array $headers = []): JsonResponse
    {
        return response()->json(['content' => $response], $status_code, $headers, JSON_UNESCAPED_UNICODE);
    }
}
