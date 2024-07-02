<?php

namespace App\Services;

use App\Exceptions\NotCreateShowException;
use App\Exceptions\NotUpdateShowException;
use App\Helpers\LoggerHelper;
use App\Helpers\NotificationHelper;
use App\Models\Show;
use App\Repositories\ShowsRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class ShowService
{
    private ShowsRepository $repository;

    public function __construct(ShowsRepository $showsRepository)
    {
        $this->repository = $showsRepository;
    }

    public function createShow(array $data): void
    {
        $data['user_id'] = Auth::user()->getAuthIdentifier();
        DB::beginTransaction();
        try {
            $this->repository->store($data);
        } catch (Throwable $exception) {
            DB::rollBack();
            LoggerHelper::afterCreating(false, [
                'exception' => $exception->getMessage(),
                'data' => $data,
            ]);
            throw new NotCreateShowException($exception->getMessage());
        }
        LoggerHelper::afterCreating(true, $data);
        NotificationHelper::info(
            'Your new show created.',
            'Now you have upload your first episode in show and publish to another platform.'
        );
        DB::commit();
    }

    public function updateShow(int $id, array $data): Show
    {
        DB::beginTransaction();
        $data['status'] = $data['status'] === true ? 'enabled' : 'disabled';
        try {
            $this->repository->update($data, $id);
        } catch (Throwable $exception) {
            DB::rollBack();
            LoggerHelper::afterCreating(false, [
                'exception' => $exception->getMessage(),
                'data' => $data,
            ]);
            throw new NotUpdateShowException($exception->getMessage());
        }

        LoggerHelper::afterUpdating(true, $data);
        NotificationHelper::info(
            'Your show updated.',
            'Now show information is updated and publish to another platform.'
        );
        DB::commit();
        return $this->getShowInfo($id);
    }

    public function getShowInfo(int $id): ?Show
    {
        return $this->repository->get($id);
    }

    public function getShortShowInfo(int $id): ?Show
    {
        return $this->repository->getShortShowInfo($id);
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
        return $this->repository->findByToken($token);
    }
}
