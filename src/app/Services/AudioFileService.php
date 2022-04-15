<?php

namespace App\Services;

use App\Models\AudioFile;
use App\Exceptions\AudioFileCreatingException;
use App\Repositories\AudioFileRepository;
use Illuminate\Support\Facades\DB;
use Throwable;

class AudioFileService
{
    /** @var AudioFileRepository */
    private AudioFileRepository $repository;

    public function __construct(AudioFileRepository $showsRepository)
    {
        $this->repository = $showsRepository;
    }

    public function getAudioFile(int $id): ?AudioFile
    {
        return $this->repository->get($id);
    }

    public function createAudioFile(array $data): AudioFile
    {
        DB::beginTransaction();

        try {
            $audioFile = $this->repository->store($data);
        } catch (Throwable $exception) {
            DB::rollBack();
            throw new AudioFileCreatingException($exception->getMessage());
        }

        DB::commit();

        return $audioFile;
    }
}
