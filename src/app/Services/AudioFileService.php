<?php

namespace App\Services;

use App\Models\AudioFile;
use App\Repositories\AudioFileRepository;

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
        return $this->repository->store($data);
    }
}
