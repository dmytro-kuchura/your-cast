<?php

namespace App\Services;

use App\Exceptions\NotCreateShowException;
use App\Models\Episode;
use App\Repositories\EpisodesRepository;
use Illuminate\Database\Eloquent\Collection;

class EpisodesService
{
    /** @var EpisodesRepository */
    private EpisodesRepository $repository;

    public function __construct(EpisodesRepository $showsRepository)
    {
        $this->repository = $showsRepository;
    }

    public function createPodcast(array $data): Episode
    {
        try {
            $show = $this->repository->store($data);
        } catch (\Throwable $e) {
            throw new NotCreateShowException($e->getMessage());
        }

        return $this->getPodcast($show->id);
    }

    public function getPodcast(int $id): ?Episode
    {
        return $this->repository->get($id);
    }

    public function createEpisode(array $data): void
    {
        $this->repository->store($data);
    }

    public function getAllUserPodcast(int $userId): ?Collection
    {
        return $this->repository->getAllUserShow($userId);
    }
}
