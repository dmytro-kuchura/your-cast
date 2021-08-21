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
     *      version="0.1.5",
     *      title="Your Cast API",
     *      description="Your Cast Swagger OpenApi description"
     * )
     *
     */
    public function returnResponse(array $response, $status_code = 200, array $headers = []): JsonResponse
    {
        $response['success'] = true;

        return response()->json($response, $status_code, $headers, JSON_UNESCAPED_UNICODE);
    }
}
