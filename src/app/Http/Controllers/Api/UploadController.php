<?php

namespace App\Http\Controllers\Api;

use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UploadController extends Controller
{
    public function uploadImage(Request $request): JsonResponse
    {
        $path = UploadHelper::save($request, $request->get('param'));

        return $this->returnResponse(['path' => $path], Response::HTTP_CREATED);
    }
}
