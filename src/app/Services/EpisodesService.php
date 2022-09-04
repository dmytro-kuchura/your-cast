<?php

namespace App\Services;

use App\Exceptions\EpisodeCreatingException;
use App\Helpers\ElasticLoggerHelper;
use App\Models\Episode;
use App\Repositories\EpisodesRepository;
use Illuminate\Database\Eloquent\Collection;
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

    public function getShowEpisodes(int $showId): Collection|array
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
            ElasticLoggerHelper::afterCreating(false, [
                'exception' => $exception->getMessage(),
                'data' => $data,
            ]);
            throw new EpisodeCreatingException($exception->getMessage());
        }

        ElasticLoggerHelper::afterCreating(true, $data);
        DB::commit();
    }
}
