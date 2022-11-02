<?php

namespace App\Services;

use App\Exceptions\NotCreateAnalyticException;
use App\Helpers\LoggerHelper;
use App\Repositories\AnalyticsAudioRepository;
use Illuminate\Support\Facades\DB;
use Throwable;

class AnalyticsService
{
    /** @var AnalyticsAudioRepository */
    private AnalyticsAudioRepository $repository;

    private $os = [
        'windows' => 'Windows',
        'OS X' => 'Mac OS X',
        'android' => 'Android [VER]',
        'ubuntu' => 'Ubuntu',
    ];

    public function __construct(AnalyticsAudioRepository $repository)
    {
        $this->repository = $repository;
    }

    public function prepareAndSave(int $fileId): void
    {
        $data = [];

        $data['audio_file_id'] = $fileId;
        $data['url'] = url()->full();
        $data['os'] = 'windows';
        $data['country'] = 'Ukraine';
        $data['city'] = 'Kyiv';

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
