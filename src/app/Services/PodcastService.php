<?php

namespace App\Services;

use App\Exceptions\NotCreateShowException;
use App\Models\Podcast;
use App\Repositories\PodcastsRepository;
use Illuminate\Database\Eloquent\Collection;

class PodcastService
{
    /** @var PodcastsRepository */
    private PodcastsRepository $repository;

    public function __construct(PodcastsRepository $showsRepository)
    {
        $this->repository = $showsRepository;
    }

    public function createPodcast(array $data): Podcast
    {
        try {
            $show = $this->repository->store($data);
        } catch (\Throwable $e) {
            throw new NotCreateShowException($e->getMessage());
        }

        return $this->getPodcast($show->id);
    }

    public function getPodcast(int $id): ?Podcast
    {
        return $this->repository->get($id);
    }

    public function getAllUserPodcast(int $userId): ?Collection
    {
        return $this->repository->getAllUserShow($userId);
    }
}
