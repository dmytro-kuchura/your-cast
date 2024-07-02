<?php

namespace App\Services;

use App\Exceptions\AudioFileCreatingException;
use App\Helpers\LoggerHelper;
use App\Models\AudioFileLink;
use App\Repositories\AudioFileLinkRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Throwable;

class AudioFileLinkService
{
    private AudioFileLinkRepository $repository;

    public function __construct(AudioFileLinkRepository $showsRepository)
    {
        $this->repository = $showsRepository;
    }

    public function getAudioFileId(string $token): ?int
    {
        return $this->repository->find($token)->id;
    }

    public function createAudioFileLink(): AudioFileLink
    {
        DB::beginTransaction();
        try {
            $data = [];
            $data['token'] = Str::random(55) . '.mp3';
            $audioFile = $this->repository->store($data);
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
        return $audioFile;
    }
}
