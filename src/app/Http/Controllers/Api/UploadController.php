<?php

namespace App\Http\Controllers\Api;

use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Services\AudioFileLinkService;
use App\Services\AudioFileService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UploadController extends Controller
{
    /** @var AudioFileService */
    private AudioFileService $audioFileService;

    /** @var AudioFileLinkService */
    private AudioFileLinkService $audioFileLinkService;

    public function __construct(AudioFileService $audioFileService, AudioFileLinkService $audioFileLinkService)
    {
        $this->audioFileService = $audioFileService;
        $this->audioFileLinkService = $audioFileLinkService;
    }

    /**
     * @OA\Post(
     *     path="/api/v1/upload-image",
     *     summary="Upload new image",
     *     tags={"Upload"},
     *     @OA\Response(
     *         response=201,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response="401",
     *         description="Unauthorized user"
     *     )
     * )
     */
    public function uploadImage(Request $request): JsonResponse
    {
        $path = UploadHelper::save($request, $request->get('param'));

        return $this->returnResponse(['path' => $path], Response::HTTP_CREATED);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/upload-audio",
     *     summary="Upload new audio file",
     *     tags={"Upload"},
     *     @OA\RequestBody(
     *        required=true,
     *        description="Upload new audio file",
     *        @OA\JsonContent(
     *           @OA\Property(property="audio", type="file"),
     *        ),
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response="401",
     *         description="Unauthorized user"
     *     )
     * )
     */
    public function uploadAudio(Request $request): JsonResponse
    {
        $path = UploadHelper::saveAudio($request);

        $fileLink = $this->audioFileLinkService->createAudioFileLink();

        $file = $this->audioFileService->createAudioFile([
            'audio_file_link_id' => $fileLink->id,
            'duration' => 3,
            'link' => $path,
            'size' => $request->file('audio')->getSize() / 1000
        ]);

        return $this->returnResponse([
            'path' => $path,
            'file_id' => $file->id,
        ], Response::HTTP_CREATED);
    }
}
