<?php

namespace App\Services;

use App\Exceptions\NotCreateShowException;
use App\Models\Show;
use App\Repositories\ShowsRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class ShowService
{
    /** @var ShowsRepository */
    private ShowsRepository $repository;

    public function __construct(ShowsRepository $showsRepository)
    {
        $this->repository = $showsRepository;
    }

    public function createShow(array $data): Show
    {
        $data['user_id'] = Auth::user()->getAuthIdentifier();

        try {
            $show = $this->repository->store($data);
        } catch (\Throwable $e) {
            throw new NotCreateShowException($e->getMessage());
        }

        return $this->getShow($show->id);
    }

    public function updateShow(int $id, array $data): Show
    {
        try {
            $this->repository->update($data, $id);
        } catch (\Throwable $e) {
            throw new NotCreateShowException($e->getMessage());
        }

        return $this->getShow($id);
    }

    public function getShow(int $id): ?Show
    {
        return $this->repository->get($id);
    }

    public function getAllUserShow(int $userId): ?Collection
    {
        return $this->repository->getAllUserShow($userId);
    }
}
