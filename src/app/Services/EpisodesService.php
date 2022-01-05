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

    public function getEpisode(int $id): ?Episode
    {
        return $this->repository->get($id);
    }

    public function createEpisode(array $data): void
    {
        $this->repository->store($data);
    }
}
