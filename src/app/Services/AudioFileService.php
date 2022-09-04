<?php

namespace App\Services;

use App\Helpers\ElasticLoggerHelper;
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

    public function getAudioFile(int $linkId): ?AudioFile
    {
        return $this->repository->find($linkId);
    }

    public function createAudioFile(array $data): AudioFile
    {
        DB::beginTransaction();

        try {
            $audioFile = $this->repository->store($data);
        } catch (Throwable $exception) {
            DB::rollBack();
            ElasticLoggerHelper::afterCreating(false, [
                'exception' => $exception->getMessage(),
                'data' => $data,
            ]);
            throw new AudioFileCreatingException($exception->getMessage());
        }

        ElasticLoggerHelper::afterCreating(true, $data);
        DB::commit();

        return $audioFile;
    }
}
