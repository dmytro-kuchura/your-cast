<?php

namespace App\Actions;

use App\Exceptions\NotCreateShowException;
use App\Models\Shows;
use App\Repositories\ShowsRepository;
use Illuminate\Support\Facades\Auth;

class ShowAction
{
    /** @var ShowsRepository */
    private ShowsRepository $repository;

    public function __construct(ShowsRepository $showsRepository)
    {
        $this->repository = $showsRepository;
    }

    public function createShow(array $data): Shows
    {
        $data['user_id'] = Auth::user()->getAuthIdentifier();

        try {
            $show = $this->repository->store($data);
        } catch (\Throwable $e) {
            throw new NotCreateShowException($e->getMessage());
        }

        return $this->getShow($show->id);
    }

    public function updateShow(int $id, array $data): Shows
    {
        try {
            $this->repository->update($data, $id);
        } catch (\Throwable $e) {
            throw new NotCreateShowException($e->getMessage());
        }

        return $this->getShow($id);
    }

    public function getShow(int $id): ?Shows
    {
        return $this->repository->get($id);
    }
}
