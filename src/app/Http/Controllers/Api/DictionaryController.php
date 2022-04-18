<?php

namespace App\Http\Controllers\Api;

use App\Helpers\CategoriesHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\TimezonesResource;
use App\Services\DictionaryService;
use Illuminate\Http\JsonResponse;

class DictionaryController extends Controller
{
    /** @var DictionaryService */
    private DictionaryService $service;

    public function __construct(DictionaryService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *     path="/api/v1/dictionary/timezones",
     *     summary="Get dictionary timezones list",
     *     tags={"Dictionary"},
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
    public function timezones(): JsonResponse
    {
        $result = [];

        $timezones = $this->service->getTimezones();

        foreach ($timezones as $timezone) {
            $result[] = new TimezonesResource($timezone);
        }

        return $this->returnResponse([
            'result' => $result
        ]);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/dictionary/languages",
     *     summary="Get dictionary languages list",
     *     tags={"Dictionary"},
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
    public function languages(): JsonResponse
    {
        $result = [];

        $languages = $this->service->getLanguages();

        foreach ($languages as $language) {
            $result[] = new TimezonesResource($language);
        }

        return $this->returnResponse([
            'result' => $result
        ]);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/dictionary/categories",
     *     summary="Get dictionary categories list",
     *     tags={"Dictionary"},
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
    public function categories(): JsonResponse
    {
        $tree = [];

        $categories = $this->service->getCategories();

        foreach ($categories as $category) {
            $tree[] = $category;
        }

        $result = CategoriesHelper::buildTree($tree, 0);

        return $this->returnResponse([
            'result' => $result
        ]);
    }
}
