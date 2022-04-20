<?php

namespace App\Services;

use App\Exceptions\NotCreateNotificationException;
use App\Repositories\NotificationRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class NotificationsService
{
    /** @var NotificationRepository */
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
            throw new NotCreateNotificationException($exception->getMessage());
        }

        DB::commit();
    }

    public function getUnread(): ?Collection
    {
        return $this->repository->unread(Auth::user()->getAuthIdentifier());
    }
}
