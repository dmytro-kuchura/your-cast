<?php

namespace App\Services;

use App\Exceptions\NotCreateNotificationException;
use App\Helpers\LoggerHelper;
use App\Repositories\NotificationRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class NotificationsService
{
    private NotificationRepository $repository;

    public function __construct(NotificationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $data): void
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
            throw new NotCreateNotificationException($exception->getMessage());
        }
        LoggerHelper::afterCreating(true, $data);
        DB::commit();
    }

    public function getUnread(): ?Collection
    {
        return $this->repository->unread(Auth::user()->getAuthIdentifier());
    }
}
