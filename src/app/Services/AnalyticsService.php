<?php

namespace App\Services;

use App\Exceptions\NotCreateAnalyticException;
use App\Helpers\LoggerHelper;
use App\Integrations\Agent\Agent;
use App\Integrations\Geo\ApiCommunicator;
use App\Integrations\Geo\Request\GetGeoRequest;
use App\Repositories\AnalyticsAudioRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Throwable;

class AnalyticsService
{
    private AnalyticsAudioRepository $repository;
    private ApiCommunicator $apiCommunicator;
    private Agent $agent;

    public function __construct(
        AnalyticsAudioRepository $repository,
        ApiCommunicator $apiCommunicator,
        Agent $agent
    )
    {
        $this->repository = $repository;
        $this->apiCommunicator = $apiCommunicator;
        $this->agent = $agent;
    }

    public function prepareAndSave(int $fileId): void
    {
        $cached = Redis::hgetall(request()->ip());
        if (empty($cached)) {
            $request = new GetGeoRequest(request()->ip());
            $response = $this->apiCommunicator->send($request);
            $cached = [
                'country' => $response->getCountry(),
                'city' => $response->getCity(),
            ];
            Redis::hmset(request()->ip(), $cached);
        }
        $data = [];
        $data['audio_file_id'] = $fileId;
        $data['url'] = url()->full();
        $data['os'] = $this->agent->platform(request()->userAgent());
        $data['country'] = $cached['country'] ?? 'n/a';
        $data['city'] = $cached['city'] ?? 'n/a';
        $this->create($data);
    }

    public function create(array $data): void
    {
        DB::beginTransaction();
        try {
            $this->repository->store($data);
        } catch (Throwable $exception) {
            DB::rollBack();
            LoggerHelper::afterCreating(false, [
                'exception' => $exception->getMessage(),
                'data' => $data,
            ]);
            throw new NotCreateAnalyticException($exception->getMessage());
        }
        LoggerHelper::afterCreating(true, $data);
        DB::commit();
    }
}
