<?php

namespace App\Services;

use App\Exceptions\EpisodeCreatingException;
use App\Helpers\LoggerHelper;
use App\Models\Episode;
use App\Repositories\EpisodesRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Throwable;

class EpisodesService
{
    /** @var EpisodesRepository */
    private EpisodesRepository $repository;

    public function __construct(EpisodesRepository $showsRepository)
    {
        $this->repository = $showsRepository;
    }

    public function getEpisode(int $id): ?Episode
    {
        return $this->repository->get($id);
    }

    public function getShowEpisodes(int $showId): ?LengthAwarePaginator
    {
        return $this->repository->getAllShowEpisodes($showId);
    }

    public function createEpisode(array $data): void
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
            throw new EpisodeCreatingException($exception->getMessage());
        }

        LoggerHelper::afterCreating(true, $data);
        DB::commit();
    }

    public function updateEpisode(array $data, int $id): void
    {
        DB::beginTransaction();

        try {
            $this->repository->update($data, $id);
        } catch (Throwable $exception) {
            DB::rollBack();
            LoggerHelper::afterCreating(false, [
                'exception' => $exception->getMessage(),
                'data' => $data,
            ]);
            throw new EpisodeCreatingException($exception->getMessage());
        }

        LoggerHelper::afterCreating(true, $data);
        DB::commit();
    }

    public function updateEpisodeStatus(string $status, int $id): void
    {
        DB::beginTransaction();

        try {
            $this->repository->updateEpisodeStatus($status, $id);
        } catch (Throwable $exception) {
            DB::rollBack();
            LoggerHelper::afterCreating(false, [
                'exception' => $exception->getMessage(),
                'data' => ['status' => $status],
            ]);
            throw new EpisodeCreatingException($exception->getMessage());
        }

        LoggerHelper::afterCreating(true, ['status' => $status]);
        DB::commit();
    }
}
