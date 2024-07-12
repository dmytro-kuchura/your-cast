<?php

namespace App\Services;

use App\Exceptions\NotCreateAnalyticException;
use App\Helpers\LoggerHelper;
use App\Integrations\Agent\Agent;
use App\Integrations\Geo\ApiCommunicator;
use App\Integrations\Geo\Request\GetGeoRequest;
use App\Repositories\AnalyticsAudioRepository;
use App\Repositories\AnalyticsFeedRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Throwable;

class AnalyticsService
{
    private AnalyticsAudioRepository $analyticsAudioRepository;
    private AnalyticsFeedRepository $analyticsFeedRepository;
    private ApiCommunicator $apiCommunicator;
    private Agent $agent;

    public function __construct(
        AnalyticsAudioRepository $analyticsAudioRepository,
        AnalyticsFeedRepository  $analyticsFeedRepository,
        ApiCommunicator          $apiCommunicator,
        Agent                    $agent
    )
    {
        $this->analyticsAudioRepository = $analyticsAudioRepository;
        $this->analyticsFeedRepository = $analyticsFeedRepository;
        $this->apiCommunicator = $apiCommunicator;
        $this->agent = $agent;
    }

    public function audioFile(int $fileId): void
    {
        $ip = $this->detectIp();
        $data = [];
        $data['audio_file_id'] = $fileId;
        $data['url'] = url()->full();
        $data['os'] = $this->agent->platform(request()->userAgent());
        $data['country'] = $ip['country'] ?? 'n/a';
        $data['city'] = $ip['city'] ?? 'n/a';
        $this->createAudioFileAnalytics($data);
    }

    public function showFeed(int $showId): void
    {
        $ip = $this->detectIp();
        $data = [];
        $data['show_id'] = $showId;
        $data['url'] = url()->full();
        $data['os'] = $this->agent->platform(request()->userAgent());
        $data['agent'] = request()->userAgent();
        $data['country'] = $ip['country'] ?? 'n/a';
        $data['city'] = $ip['city'] ?? 'n/a';
        $this->createFeedAnalytics($data);
    }

    public function createAudioFileAnalytics(array $data): void
    {
        DB::beginTransaction();
        try {
            $this->analyticsAudioRepository->store($data);
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

    public function createFeedAnalytics(array $data): void
    {
        DB::beginTransaction();
        try {
            $this->analyticsFeedRepository->store($data);
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

    private function detectIp(): array
    {
        $cached = Redis::hgetall(request()->ip());
        if (empty($cached)) {
            $request = new GetGeoRequest(request()->ip());
            $response = $this->apiCommunicator->send($request);
            $cached = [
                'country' => $response->getCountry() ?? null,
                'city' => $response->getCity() ?? null,
            ];
            Redis::hmset(request()->ip(), $cached);
        }
        return $cached;
    }
}
