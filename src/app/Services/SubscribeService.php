<?php

namespace App\Services;

use App\Exceptions\AudioFileCreatingException;
use App\Helpers\LoggerHelper;
use App\Models\Subscribe;
use App\Repositories\SubscribeRepository;
use Illuminate\Support\Facades\DB;
use Throwable;

class SubscribeService
{
    /** @var SubscribeRepository */
    private SubscribeRepository $repository;

    public function __construct(SubscribeRepository $subscribeRepository)
    {
        $this->repository = $subscribeRepository;
    }

    public function validate(string $email): bool
    {
        $subscribe = $this->repository->findByEmail($email);

        return isset($subscribe->id);
    }

    public function createSubscribe(array $data): Subscribe
    {
        DB::beginTransaction();

        try {
            $subscribe = $this->repository->store($data);
        } catch (Throwable $exception) {
            DB::rollBack();
            LoggerHelper::afterCreating(false, [
                'exception' => $exception->getMessage(),
                'data' => $data,
            ]);
            throw new AudioFileCreatingException($exception->getMessage());
        }

        LoggerHelper::afterCreating(true, $data);

        DB::commit();

        return $subscribe;
    }
}
