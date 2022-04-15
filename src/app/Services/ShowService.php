<?php

namespace App\Services;

use App\Exceptions\NotCreateShowException;
use App\Models\Show;
use App\Repositories\ShowsRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

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

        DB::beginTransaction();

        try {
            $this->repository->store($data);
        } catch (Throwable $exception) {
            DB::rollBack();
            throw new NotCreateShowException($exception->getMessage());
        }

        DB::commit();

        return $this->getShowInfo($show->id);
    }

    public function updateShow(int $id, array $data): Show
    {
        DB::beginTransaction();

        try {
            $this->repository->update($data, $id);
        } catch (Throwable $exception) {
            DB::rollBack();
            throw new NotCreateShowException($exception->getMessage());
        }

        DB::commit();

        return $this->getShowInfo($id);
    }

    public function getShowInfo(int $id): ?Show
    {
        return $this->repository->get($id);
    }

    public function getAllUserShow(int $userId): ?Collection
    {
        return $this->repository->getAllUserShow($userId);
    }

    public function getAllUserShowShort(int $userId): ?Collection
    {
        return $this->repository->getAllUserShowShort($userId);
    }

    public function getShowForFeed(string $token): ?Show
    {
        $collection = $this->repository->findByToken($token);

        return $collection[0] ? $collection[0] : null;
    }
}
